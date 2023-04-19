<script setup>
import { ref,computed } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Meetings/Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Meetings/Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';


import MeetingInfoForm from '@/Pages/Meetings/Partials/MeetingInfoForm.vue';
import MeetingAgendaForm from '@/Pages/Meetings/Partials/MeetingAgendaForm.vue';
import MeetingAgendaContributorForm from '@/Pages/Meetings/Partials/MeetingAgendaContributorForm.vue';

import MeetingOrganizerForm from '@/Pages/Meetings/Partials/MeetingOrganizerForm.vue';
import TwoFactorAuthenticationForm from '@/Pages/Meetings/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Meetings/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Meetings/Partials/UpdateProfileInformationForm.vue';



defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
    meeting: Object,
    users: Array,
    organizers:Array,
    contributors:Array,
    agendas:Array,
    participants: Array,
    schedules: Array,
    notifications: Array
});


const showMeetingOrganizerSection = ref(false);

const showMeetingAgendaContributorSection = ref(false);

const showMeetingAgendaSection = ref(false);

const showOrganizerSection = () => { 
    return showMeetingOrganizerSection.value = !showMeetingOrganizerSection.value ;
}; 

const showContributorSection = () => { 
    return showMeetingAgendaContributorSection.value = !showMeetingAgendaContributorSection.value ;
};

const showAgendaSection = () => { 
    return showMeetingAgendaSection.value = !showMeetingAgendaSection.value ;
};

</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                 <MeetingInfoForm  :meeting = "meeting" :schedules = "schedules" :notifications="notifications" class="mt-10 sm:mt-0" />

                 <SectionBorder />


                        <button class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showOrganizerSection">
                <p v-show="!showMeetingOrganizerSection">Add Meeting Organizer</p> 
                <p v-show="showMeetingOrganizerSection">Close Meeting Organizer</p>           
            </button>

            </div>

            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
               
                    <MeetingOrganizerForm :users="users" :organizers="organizers" :meeting="meeting" :user="$page.props.auth.user" v-show="showMeetingOrganizerSection" id="organizer"/>

            <SectionBorder />
                  

                <button class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showContributorSection">
                <p v-show="!showMeetingAgendaContributorSection">Add Agenda Contributor</p> 
                <p v-show="showMeetingAgendaContributorSection">Close Agenda Contributor</p>           
            </button>

                </div>

              <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">              
                    <MeetingAgendaContributorForm :users="users" :contributors="contributors" :meeting="meeting" :user="$page.props.auth.user" v-show="showMeetingAgendaContributorSection" />

                    <SectionBorder />


            <button class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showAgendaSection">
                <p v-show="!showMeetingAgendaSection">Add Agenda </p> 
                <p v-show="showMeetingAgendaSection">Close Agenda </p>           
            </button>

                    
                </div>

               <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">              
                    <MeetingAgendaForm :users="users" :agendas="agendas" :meeting="meeting" :user="$page.props.auth.user" v-show="showMeetingAgendaSection" />

                    <SectionBorder />
                </div>

               
          
        </div>
    </AppLayout>
</template>
