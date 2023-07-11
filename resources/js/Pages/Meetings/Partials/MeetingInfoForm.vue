<script setup>
import { ref,computed } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import moment from "moment";
import ActionMessage from '@/Components/ActionMessage.vue';
import ActionSection from '@/Components/ActionSection.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import NotificationButton from '@/Components/NotificationButton.vue';
import EditButtonLink from '@/Components/EditButtonLink.vue';
import TabButton from '@/Components/TabButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SectionBorder from '@/Components/SectionBorder.vue';


import MeetingOrganizerForm from '@/Pages/Meetings/Partials/MeetingOrganizerForm.vue';

const props = defineProps({
    sessions: Array,
    meeting: Object,
    users: Array,
    organizers:Array,
    schedules: Array,
    notifications:Array,
    can: Object,
});

const confirmingLogout = ref(false);
const passwordInput = ref(null);




const meetingStatus = computed(() => {


   switch (props.meeting.status){
   case 1:
       return 'UnPublished'
       break;

    case 2:
       return 'Published'
       break;


    case 3:
       return 'Progress'
       break;


    case 4:
       return 'Closed'
       break;
   }

});

const form = useForm({
    _method: 'PUT',
    id: props.meeting.id,
    status: props.meeting.status,

});

const formEdit = useForm({
    // id: props.meeting.id,

});

const publishMeeting = () => {
    // form.status =  2;
    form.post(route('meeting-publish', props.meeting.id), {
        preserveScroll: true,
    });
};


const startMeeting = () => {
    // form.status =  3;
    form.post(route('meeting-start', props.meeting.id), {
        preserveScroll: true,
    });
};

const closeMeeting = () => {
    // form.status =  4;
    form.post(route('meeting-end', props.meeting.id), {
        preserveScroll: true,
    });
};


const resetMeeting = () => {
    // form.status =  1;
    form.post(route('meeting-reset', props.meeting.id), {
        preserveScroll: true,
    });
};

const joinMeeting = () => {
    // form.status =  1;
    form.post(route('meeting-join', props.meeting.id), {
        preserveScroll: true,
    });
};

const scheduleNextMeeting = () => {
    formEdit.get(route('next-meeting', props.meeting.id), {
        preserveScroll: true,
    });
};

const exportDraftMinutes = () => {
    formEdit.get(route('generate-draft-minutes', props.meeting.id), {
        preserveScroll: true,
    });
};

const sendExportMeetingPack = () => {
    formEdit.get(route('generate-meeting-pack', props.meeting.id), {
        preserveScroll: true,
    });
};

const exportSendMinute = () => {
    formEdit.get(route('meetings.edit', props.meeting.id), {
        preserveScroll: true,
    });
};

const editMeeting = () => {
    formEdit.get(route('meetings.edit', props.meeting.id), {
        preserveScroll: true,
    });
};





const logoutOtherBrowserSessions = () => {
    form.delete(route('other-browser-sessions.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingLogout.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection>
        <template #title>
            Meeting Info
        </template>

        <template #description>




        </template>

        <template #content>

            <div class="flex space-x-2 mb-2 justify-end">

               <NotificationButton v-if="can.create_meeting"  @click="scheduleNextMeeting" >
                    Schedule Next Meeting
               </NotificationButton>
               <EditButtonLink v-if="can.export_meeting_minutes" @click="exportDraftMinutes" >
                    Export Draft Minutes
                </EditButtonLink>
               <NotificationButton v-if="can.send_meeting_pack" @click="sendExportMeetingPack" >
                    Export/ Send Meeting Pack
               </NotificationButton>
               <EditButtonLink v-if="can.edit_meeting" @click="editMeeting" >
                    Edit
                </EditButtonLink>
            </div>
            <div class=" w-full text-sm text-gray-600">
                            <table class="w-full whitespace-nowrap">
                                <tbody>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Meeting type
                                    </td>
                                    <td class="border-t p-2">
                                        {{ meeting.meeting_type}}
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Meeting title
                                    </td>
                                    <td class="border-t p-2">
                                        {{ meeting.title }}
                                    </td>
                                </tr>
                                <tr v-for="(schedule, index) in schedules" :key="schedule.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td v-show="index == 0" class="border-t p-2">
                                        Meeting Schedule
                                    </td>
                                    <td v-show="index != 0" class="border-t p-2">

                                    </td>
                                    <td class="border-t p-2">
                                        {{ moment(schedule.meeting_date).format('dddd, MMMM DD, YYYY') }} {{ moment(schedule.meeting_start_time, 'HH:mm:ss').format('hh:mm A') }} to {{ moment(schedule.meeting_end_time, 'HH:mm').format('hh:mm A') }}
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Timezone
                                    </td>
                                    <td class="border-t p-2">
                                        {{ meeting.timezone_id }}
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Venue
                                    </td>
                                    <td class="border-t p-2">
                                        {{ meeting.venue }}
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Google map url
                                    </td>
                                    <td class="border-t p-2">
                                        {{ meeting.google_map_url }}
                                    </td>
                                </tr>

                                <tr v-for="(notification, index) in notifications" :key="notification.id" class="hover:bg-gray-100 focus-within:bg-gray-100">

                                    <td v-show="index == 0" class="border-t p-2">
                                        Reminder
                                    </td>
                                    <td v-show="index != 0" class="border-t p-2">

                                    </td>



                                    <td class="border-t p-2">
                                        {{ notification.notification_date }}
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Description
                                    </td>
                                    <td class="border-t p-2">
                                        {{ meeting.description }}
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Notes for participants
                                    </td>
                                    <td class="border-t p-2">
                                        {{ meeting.participants_notes }}
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Notes for Organizers
                                    </td>
                                    <td class="border-t p-2">
                                        {{ meeting.organizer_notes }}
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Status
                                    </td>
                                    <td class="border-t p-2">
                                        {{ meetingStatus }}
                                    </td>
                                </tr>
                                <tr v-if="meeting.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No meetings found.</td>
                                </tr>
                                </tbody>
                            </table>
            </div>



            <div class="flex items-center mt-5"  v-if="can.publish_meeting" v-show="meetingStatus =='UnPublished'">
                <PrimaryButton  @click="publishMeeting" >
                    Publish
                </PrimaryButton>

                <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                    Done.
                </ActionMessage>
            </div>

            <div class="flex items-center mt-5"  v-if="can.participate_meeting" v-show="meetingStatus =='Progress'">
                <!-- <PrimaryButtonk  @click="startMeeting" >
                    Join Meeting
                </PrimaryButtonk> -->

                <Link      :href="route('live-meeting', { meeting_id: meeting.id, agenda_id: 0, document_id: 0 })" >
                    <!-- <Link  :href="`/live-meeting/${meeting.id}/`" > -->
                    Join Meeting
                </Link>



                <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                    Done.
                </ActionMessage>
            </div>


            <div class="flex items-center mt-5" v-if="can.start_meeting" v-show="meetingStatus =='Published'">
                <PrimaryButton  @click="startMeeting" >
                    Start Meeting
                </PrimaryButton>

                <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                    Done.
                </ActionMessage>
            </div>




            <div class="flex items-center mt-5" v-if="can.close_meeting" v-show="meetingStatus =='Progress'">
                <PrimaryButton  @click="closeMeeting" >
                    Close Meeting
                </PrimaryButton>

                <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                    Done.
                </ActionMessage>
            </div>



            <div class="flex items-center mt-5" v-if="can.reset_meeting" >
                <PrimaryButton  @click="resetMeeting" >
                    Reset Meeting
                </PrimaryButton>

                <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                    Done.
                </ActionMessage>
            </div>

        </template>


    </ActionSection>
</template>
