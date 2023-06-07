<script setup>
import { ref,reactive } from "vue";
// import { Inertia } from "@inertiajs/inertia";
import { Head, Link, useForm } from "@inertiajs/vue3";
// import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Checkbox from '@/Components/Checkbox.vue';

import DangerButton from "@/Components/DangerButton.vue";
import DialogModal from "@/Components/DialogModal.vue";

const props = defineProps({
  meeting: Object,
  meeting_types: Array,
  events: Array,
  reminders: Array,

});



const events = reactive([{
    id: 0,
    meeting_id: 0,
    meeting_date:'',
    meeting_start_time:'',
    meeting_end_time:''
}]);

const reminders = reactive([{
    reminder:'',

}]);

const addField = (value, fieldType) => {

    fieldType.push({ })

};

const removeField = (index, fieldType) => {
      fieldType.splice(index, 1)

}


const form = useForm({
  old_meeting_id: props.meeting.id,
  meeting_type_id: props.meeting.meeting_type_id,
  title: props.meeting.title,
  events:props.events,
  venue: props.meeting.venue,
  google_map_url: props.meeting.google_map_url,
  timezone_id: props.meeting.timezone_id,
  description: props.meeting.description,
  participants_notes: props.meeting.participants_notes,
  organizer_notes: props.meeting.organizer_notes,
  organizer_title: props.meeting.organizer_title,
  reminders: props.reminders,
  status: props.meeting.status,
  organizers: false,
  contributors: false,
  participants: false,
  agendas: false,

});



const createMeeting = () => {
  form.post(route("meetings.store"), {
    onFinish: () => form.reset(),
  });
};


</script>
<template>
    <AppLayout title="Accounts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Meeting
            </h2>
        </template>

        <div>
       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                <FormSection @submitted="createMeeting">
                    <template #title>
                        Meeting Information
                    </template>

                    <template #description>
                        Create Next Meeting.
                    </template>

                    <template #form>


                    <!-- Meeting Type -->


                    <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="Meeting type" value="Meeting type" />
                    <select
                        v-model="form.meeting_type_id"
                        :error="form.errors.meeting_type_id"
                        required
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Organization">

                            <option v-for="meeting_type in meeting_types" :key="meeting_type.id" :value="meeting_type.id">{{ meeting_type.name }}</option>
                    </select>
                    </div>






                    <!-- Meeting Title -->
                    <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="title" value="Meeting title" />
                    <TextInput
                        id="title"
                        v-model="form.title"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="title"
                        required
                    />
                    <InputError :message="form.errors.title" class="mb-2" />
                    </div>


                    <!-- Event or Schedule -->

                    <div v-for="( input , index) in form.events" :key="`Event-${index}`" class="col-span-6 sm:col-span-4 flex" >



                    <!-- Meeting Date -->
                    <div class="col-span-4 sm:col-span-2">

                    <InputLabel for="meeting_date" :value="`Meeting date for day ${index + 1}`" />
                    <TextInput
                        id="input.meeting_date"
                        v-model="input.meeting_date"
                        type="date"
                        class="mt-1 block w-full"
                        autocomplete="inputmeeting_date"
                        required
                    />

                    <InputError :message="form.errors.meeting_date" class="mt-2" />

                    </div>


                    <!-- Meeting Start Time -->


                    <div class="col-span-2 sm:col-span-1 ml-2">

                    <InputLabel for="meeting_start_time" value="Start time" />
                    <TextInput
                        id="meeting_start_time"
                        v-model="input.meeting_start_time"
                        type="time"
                        class="mt-1  block w-full"
                        autocomplete="meeting_start_time"
                        required
                    />
                    <InputError :message="form.errors.meeting_start_time" class="mt-2" />
                    </div>

                    <!-- Meeting End Time -->


                    <div class="col-span-2 sm:col-span-1 ml-2">

                    <InputLabel for="meeting_end_time" value="End time" />
                    <TextInput
                        id="meeting_end_time"
                        v-model="input.meeting_end_time"
                        type="time"
                        class="mt-1 block w-full"
                        autocomplete="meeting_end_time"
                        required
                    />
                    <InputError :message="form.errors.meeting_end_time" class="mt-2" />
                    </div>

                    <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                    <button type="button" @click="addField(input, form.events)"  class="text-xl">+</button>

                    </div>

                    <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                    <button v-show="form.events.length > 1" type="button" @click ="removeField(index, form.events)" class="text-xl">-</button>

                    </div>





                    </div>





                    <!-- Meeting Venue -->
                    <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="venue" value="Venue" />
                    <TextInput
                        id="venue"
                        v-model="form.venue"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="venue"
                        required
                    />
                    <InputError :message="form.errors.venue" class="mt-2" />
                    </div>





                    <!-- Google Map Url -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="venue" value="Google Map URL" />
                    <TextInput
                        id="google_map_url"
                        v-model="form.google_map_url"
                        type="url"
                        class="mt-1 block w-full"
                        autocomplete="google_map_url"
                        placeholder="Enter Google map URL here"
                    />
                    <InputError :message="form.errors.google_map_url" class="mt-2" />
                    </div>

                    <!-- Meeting Description -->

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="participants_notes" value="Notes for Participants" />
                        <textarea
                        id="description"
                        v-model="form.description"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        autocomplete="description"
                        >
                        </textarea>
                        <InputError :message="form.errors.participants_notes" class="mt-2" />
                    </div>

                    <!-- Notes for Participants -->

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="participants_notes" value="Notes for Participants" />
                        <textarea
                        id="participants_notes"
                        v-model="form.participants_notes"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        autocomplete="participants_notes"
                        >
                        </textarea>
                        <InputError :message="form.errors.participants_notes" class="mt-2" />
                    </div>



                    <!-- Notes for Organizer -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="organizer_notes" value="Notes for Organizer" />
                        <textarea
                        id="organizer_notes"
                        v-model="form.organizer_notes"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        autocomplete="organizer_notes"
                        >
                        </textarea>
                        <InputError :message="form.errors.organizer_notes" class="mt-2" />
                    </div>

                    <!-- <input type="range" name="age" min="18" max="60" value="18"
                    oninput="this.nextElementSibling.value = this.value">
                    <output>18</output> -->



                    <!-- Reminder -->


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
                        required
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

                    <TextInput
                    id="old_meeting_id"
                    v-model="form.old_meeting_id"
                    type="hidden"
                     />


            <div class="flex space-x-2  col-span-6 sm:col-span-4">
                <InputLabel for="includes" value="Includes" class="m-4" />

            <!-- Organizers -->
            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.organizers" name="organizers" />
                    <span class="ml-2 text-sm text-gray-600">Organizers</span>
                </label>
            </div>

            <!-- Contributors -->
            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.contributors" name="contributors" />
                    <span class="ml-2 text-sm text-gray-600">Contributors</span>
                </label>
            </div>

            <!-- Agendas -->
            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.agendas" name="agendas" />
                    <span class="ml-2 text-sm text-gray-600">Agendas</span>
                </label>
            </div>

            <!-- Participants -->
            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.participants" name="participants" />
                    <span class="ml-2 text-sm text-gray-600">Participants</span>
                </label>
            </div>
            </div>









                    </template>






                    <template #actions>







                        <!-- <Link class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition" :href="`/accounts/${account.id}`" >
                            <span>Delete</span>
                            <span class="hidden md:inline">&nbsp;Account</span>
                        </Link> -->

                        <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </ActionMessage>

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create
                        </PrimaryButton>
                    </template>
                </FormSection>

                    <SectionBorder />
                </div>

            </div>
        </div>
    </AppLayout>
</template>
