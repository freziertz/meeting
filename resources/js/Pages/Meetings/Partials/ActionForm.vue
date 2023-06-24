<script setup>
import { ref,computed } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';

import moment from "moment";
import ActionMessage from '@/Components/ActionMessage.vue';
import ActionSection from '@/Components/ActionSection.vue';
import DialogModal from '@/Components/DialogModal.vue';
import Checkbox from '@/Components/Checkbox.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PartialFormSection from '@/Components/PartialFormSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import CalendarButton from '@/Components/CalendarButton.vue';
import NotificationButton from '@/Components/NotificationButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import DeleteButton from '@/Components/DeleteButton.vue';

const props = defineProps({
    users: Array,
    agendas: Array,
    statuses: Array,
    user: Object,
    sessions: Array,
    actions: Array,
    statuses: Array,
    meeting: Object,
    can: Object,
});


const showForm = ref(false);
const todayDate = moment().format('YYYY-MM-DD');

const form = useForm({
    agenda_id: null,
    name: 'test',
    actioners:[{
      actioner_id: null
,
      }],
    due_date: null,
    reminders: [{
       reminder: null,
    }],
    status_id: null,
    notes: '',
    as_of_date: null,
    meeting_id: props.meeting.id,
});


const createAction = () => {
    form.post(route('actions.store'), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => form.reset(),

    });
};


const sendNotificationToActioner = () => {
    form.post(route('notifications.action', props.meeting.id), {
        preserveScroll: true,
    });
};

const bringForwardAction = () => {
    form.post(route('schedules.conflict', props.meeting.id), {
        preserveScroll: true,
    });
}

const exportAction = () => {
    form.post(route('schedules.conflict', props.meeting.id), {
        preserveScroll: true,
    });
}




const showActionForm = () => {
    return showForm.value = !showForm.value ;
};


const deleteAction = (id) => {
    form.delete(route('actions.destroy', id), {
        preserveScroll: true,

        onFinish: () => form.reset(),
    });
};


const addField = (value, fieldType) => {
        fieldType.push({ })
};

const removeField = (index, fieldType) => {
      fieldType.splice(index, 1)

}






</script>

<template>
    <ActionSection>
        <template #title>
            Actions
        </template>

        <template #description>
            Manage Actions
        </template>

        <template #content>

        <div class="flex space-x-2 justify-end">
               <NotificationButton v-if="can.organize_meeting" @click="sendNotificationToActioner" >
                    Send Notification
               </NotificationButton>
                <CalendarButton v-if="can.organize_meeting" @click="bringForwardAction" >
                    Bring Forward
                </CalendarButton>
               <NotificationButton v-if="can.organize_meeting" @click="exportAction" >
                    Export
               </NotificationButton>
         </div>

            <div class=" w-full text-sm text-gray-600">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                    <tr class="text-left font-bold">
                                        <th class="pb-4 pt-6 px-6">Action</th>
                                        <th class="pb-4 pt-6 px-6">Responsible</th>
                                        <th class="pb-4 pt-6 px-6">Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="action in actions" :key="action.id" class="hover:bg-gray-100 focus-within:bg-gray-100">


                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/actions/${action.id}`">
                                            {{ action.name }}

                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/actions/${action.id}`">
                                            {{ action.first_name }} {{ action.last_name }}

                                        </Link>
                                    </td>


                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/actions/${action.id}`">
                                            {{ action.due_date }}

                                        </Link>
                                    </td>







                                    <td class="border-t">

                                    <delete-button v-if="can.organize_meeting" @delete="deleteAction(`${action.id}`)">Delete</delete-button>

                                    </td>

                                </tr>
                                </tbody>
                    </table>
            </div>

            <button v-if="can.organize_meeting" class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showActionForm">
                <p v-show="!showForm">Add Meeting Action</p>
                <p v-show="showForm">Close Meeting Action</p>
            </button>

            <SectionBorder />





            <div v-show="showForm">

            <PartialFormSection @submitted="createAction" >


              <template #form>


                   <!-- User Id -->

            <div class="col-span-6 sm:col-span-4">
               <InputLabel for="agenda_id" value="Select agenda" />

                <select
                   v-model="form.agenda_id"
                   :error="form.errors.agenda_id"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="User"
                   required
                   >

                        <option v-for="agenda in agendas" :key="agenda.id" :value="agenda.id">{{ agenda.title}}</option>
                </select>


            </div>

            <!-- Action -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Action"/>
                <TextArea
                    id="name"
                    v-model="form.name"
                    type="textarea"
                    class="mt-1 block w-full"
                    autocomplete="name"
                    required
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>






            <!-- Responsible Person -->



            <div v-for="( input , index) in form.actioners" :key="`Actioner-${index}`" class="col-span-6 sm:col-span-4 flex" >

                    <!-- Actioner - responsible person -->

                    <div class="col-span-6 sm:col-span-4">
                <InputLabel for="actioner_id" :value="`Assined to ${index + 1}`" />
                <select
                   id = "actioner_id"
                   v-model="input.actioner_id"
                   :error="form.errors.actioner_id"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="User"
                   required
                   >

                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.first_name }} {{ user.last_name }}</option>
                </select>

            </div>





                    <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                        <button type="button" @click="addField(input, form.actioners)"  class="text-xl">+</button>
                    </div>

                    <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                         <button v-show="form.actioners.length > 1" type="button" @click ="removeField(index, form.actioners)" class="text-xl">-</button>
                    </div>


            </div>


            <!-- Due Date -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="due_date" value="Due Date" />
                <TextInput
                    id="due_date"
                    v-model="form.due_date"
                    type="date"
                    class="mt-1 block w-full"
                    autocomplete="due_date"
                    required
                />
                <InputError :message="form.errors.due_date" class="mt-2" />
            </div>

            <div v-for="( input , index) in form.reminders" :key="`Reminder-${index}`" class="col-span-6 sm:col-span-4 flex" >




                <!-- Meeting Reminder -->
                <div class="col-span-4 sm:col-span-2">

                    <InputLabel for="reminder" :value="`Remainder in days`" />
                    <TextInput
                        id="reminder"
                        v-model="input.reminder"
                        type="number"
                        min="1"
                        class="mt-1 block w-full"
                        autocomplete="reminder"

                    />

                <InputError :message="form.errors.reminder" class="mt-2" />

                </div>




                <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                <button type="button" @click="addField(input, form.reminders)"  class="text-xl">+</button>

                </div>

                <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                <button v-show="form.reminders.length > 1" type="button" @click ="removeField(index, form.reminders)" class="text-xl">-</button>

                </div>

            </div>



            <!-- Status_id -->

            <div class="col-span-6 sm:col-span-4">
            <InputLabel for="status_id" value="Status" />

                <select
                   v-model="form.status_id"
                   :error="form.errors.status_id"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="User">

                        <option v-for="status in statuses" :key="status.id" :value="status.id">{{ status.name }}</option>
                </select>


            </div>





            <!-- As of -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="as_of_date" value="As of" />
                <TextInput
                    id="as_of_date"
                    v-model="form.as_of_date"
                    type="date"
                    class="mt-1 block w-full"
                    autocomplete="as_of_date"

                />
                <InputError :message="form.errors.as_of_date" class="mt-2" />
            </div>



            <!-- Action -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="notes" value="Progress/ Note"/>
                <TextArea
                    id="notes"
                    v-model="form.notes"
                    type="textarea"
                    class="mt-1 block w-full"
                    autocomplete="notes"
                />
                <InputError :message="form.errors.notes" class="mt-2" />
            </div>









            <!-- Meeting Id-->




                <TextInput
                    id="meeting_id"
                    v-model="form.meeting_id"
                    type="hidden"
                     />

                <TextInput
                id="meeting_id"
                v-model="form.meeting_id"
                type="hidden"
                    />








        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>




        </template>


              </PartialFormSection>

              </div>






        </template>
    </ActionSection>
</template>
