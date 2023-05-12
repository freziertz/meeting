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
import DeleteButton from '@/Components/DeleteButton.vue';

const props = defineProps({
    users: Array,
    groups: Array,
    meeting_roles: Array,
    user: Object,
    sessions: Array,
    participants: Array,
    meeting: Object,
});

const confirmingLogout = ref(false);
const showForm = ref(false);
const showMeetingParticipant = ref(false);
const passwordInput = ref(null);





const form = useForm({
    id: null,
    title: null,
    primary: false,
    participant_id: null,
    meeting_role_id: null,
    group_id: null,
    participantable_type: 'Meeting',
    meeting_id: props.meeting.id,
});


const createMeetingParticipant = () => {
    form.post(route('participants.store'), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        // onSuccess: () => clearPhotoFileInput(),
    });
};


const sendNotificationToParticipants = () => {
    form.post(route('notifications.participant', props.meeting.id), {
        preserveScroll: true,
    });
};

const checkScheduleConflict = () => {
    form.post(route('schedules.conflict', props.meeting.id), {
        preserveScroll: true,
    });
}




const showParticipantForm = () => {
    return showForm.value = !showForm.value ;
};


const deleteParticipant = (id) => {
    form.delete(route('participants.destroy', id), {
        preserveScroll: true,
    });
};






</script>

<template>
    <ActionSection>
        <template #title>
            Participants
        </template>

        <template #description>
            Manage Participants
        </template>

        <template #content>

        <div class="flex space-x-2 justify-end">
                <CalendarButton @click="checkScheduleConflict" >
                    Check Schedule Conflict
                </CalendarButton>
               <NotificationButton @click="sendNotificationToParticipants" >
                    Send Notification
               </NotificationButton>
         </div>

            <div class=" w-full text-sm text-gray-600">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                    <tr class="text-left font-bold">
                                        <th class="pb-4 pt-6 px-6">Participant</th>

                                        <th class="pb-4 pt-6 px-6">Title</th>
                                        <th class="pb-4 pt-6 px-6">Meeting Role</th>
                                        <th class="pb-4 pt-6 px-6">Group</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="participant in participants" :key="participant.id" class="hover:bg-gray-100 focus-within:bg-gray-100">


                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/participants/${participant.id}`">
                                            {{ participant.first_name }} {{ participant.last_name }}

                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/participants/${participant.id}`">
                                            {{ participant.designation }}

                                        </Link>
                                    </td>


                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/participants/${participant.id}`">
                                            {{ participant.meeting_role_name }}

                                        </Link>
                                    </td>


                                    <td class="border-t">
                                    <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/participants/${participant.id}`">
                                            {{ participant.group_name }}

                                        </Link>
                                    </td>


                                    <td class="border-t">
                                    <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/participants/${participant.id}`">
                                            {{ participant.group }}

                                        </Link>
                                    </td>


                                    <td class="border-t">

                                    <delete-button @delete="deleteParticipant(`${participant.id}`)">Delete</delete-button>

                                    </td>

                                </tr>
                                </tbody>
                    </table>
            </div>

            <button class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showParticipantForm">
                <p v-show="!showForm">Add Meeting Participant</p>
                <p v-show="showForm">Close Meeting Participant</p>
            </button>

            <SectionBorder />





            <div v-show="showForm">

            <PartialFormSection @submitted="createMeetingParticipant" >


              <template #form>








            <!-- User Id -->

            <div class="col-span-6 sm:col-span-4">
            <InputLabel for="user_id" value="Select user" />

                <select
                   v-model="form.participant_id"
                   :error="form.errors.participant_id"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="User"
                   required
                   >

                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.first_name + " " + user.last_name}}</option>
                </select>


            </div>



            <!-- Meeting Role Id -->

            <div class="col-span-6 sm:col-span-4">
            <InputLabel for="meeting_role_id" value="Select Meeting Role" />

                <select
                   v-model="form.meeting_role_id"
                   :error="form.errors.meeting_role_id"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Meeting Role">

                        <option v-for="meeting_role in meeting_roles" :key="meeting_role.id" :value="meeting_role.id">{{ meeting_role.name }}</option>
                </select>


            </div>



            <!-- Group Id -->

            <div class="col-span-6 sm:col-span-4">
            <InputLabel for="group_id" value="Select Group" />

                <select
                   v-model="form.group_id"
                   :error="form.errors.group_id"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Group">

                        <option v-for="group in groups" :key="group.id" :value="group.id">{{ group.name}}</option>
                </select>


            </div>




            <!-- Meeting Id-->




                <TextInput
                    id="meeting_id"
                    v-model="form.meeting_id"
                    type="hidden"
                     />

             <TextInput  id="participantable_type" v-model="form.participantable_type" type="hidden"  />







            <!-- Title -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="title" value="Title" />
                <TextInput
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="title"
                />
                <InputError :message="form.errors.title" class="mt-2" />

                <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
                    <p class="text-sm mt-2">
                        Your email address is unverified.

                        <Link
                            :href="route('verification.send')"
                            method="post"
                            as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click.prevent="sendEmailVerification"
                        >
                            Click here to re-send the verification email.
                        </Link>
                    </p>

                    <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </div>
                </div>
            </div>
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
