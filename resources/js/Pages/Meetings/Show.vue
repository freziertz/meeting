<script setup>
import { ref,computed } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Meetings/Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Meetings/Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';

import TabButton from '@/Components/TabButton.vue';
import DeleteButton from '@/Components/DeleteButton.vue';


import MeetingInfoForm from '@/Pages/Meetings/Partials/MeetingInfoForm.vue';
import MeetingAgendaForm from '@/Pages/Meetings/Partials/MeetingAgendaForm.vue';
import ParticipantForm from '@/Pages/Meetings/Partials/ParticipantForm.vue';
import ActionForm from '@/Pages/Meetings/Partials/ActionForm.vue';
import MeetingAgendaContributorForm from '@/Pages/Meetings/Partials/MeetingAgendaContributorForm.vue';

import MeetingOrganizerForm from '@/Pages/Meetings/Partials/MeetingOrganizerForm.vue';
import TwoFactorAuthenticationForm from '@/Pages/Meetings/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Meetings/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Meetings/Partials/UpdateProfileInformationForm.vue';



defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
    actions: Array,
    meeting: Object,
    users: Array,
    meeting_roles: Array,
    groups: Array,
    purposes: Array,
    organizers:Array,
    contributors:Array,
    agendas:Array,
    statuses:Array,
    documents:Array,
    purposes:Array,
    participants: Array,
    schedules: Array,
    notifications: Array,
    can: Object,
});


const showMeetingOrganizerSection = ref(false);

const showMeetingAgendaContributorSection = ref(false);

const showMeetingAgendaSection = ref(false);

const showMeetingActionSection = ref(false);

const preserveScroll = ref(false);


const showMeetingParticipantSection = ref(false);

const showActionSection = () => {
    showMeetingAgendaContributorSection.value = false;
    showMeetingOrganizerSection.value = false;
    showMeetingAgendaSection.value = false;
    showMeetingParticipantSection.value = false;
    preserveScroll: true;
    return showMeetingActionSection.value = !showMeetingActionSection.value ;
};


const showOrganizerSection = () => {

    showMeetingAgendaContributorSection.value = false;
    showMeetingActionSection.value = false;
    showMeetingAgendaSection.value = false;
    showMeetingParticipantSection.value = false;
    preserveScroll: true;
    return showMeetingOrganizerSection.value = !showMeetingOrganizerSection.value ;
};

const showContributorSection = () => {
    showMeetingOrganizerSection.value = false;
    showMeetingActionSection.value = false;
    showMeetingAgendaSection.value = false;
    showMeetingParticipantSection.value = false;
    preserveScroll: true;
    return showMeetingAgendaContributorSection.value = !showMeetingAgendaContributorSection.value ;
};

const showAgendaSection = () => {
    showMeetingOrganizerSection.value = false;
     showMeetingAgendaContributorSection.value = false;
     showMeetingActionSection.value = false;
     showMeetingParticipantSection.value = false;
    return showMeetingAgendaSection.value = !showMeetingAgendaSection.value ;
};


const showParticipantSection = () => {
     showMeetingOrganizerSection.value = false;
     showMeetingAgendaContributorSection.value = false;
     showMeetingActionSection.value = false;
     showMeetingAgendaSection.value = false;
     preserveScroll: true;
    return showMeetingParticipantSection.value = !showMeetingParticipantSection.value;
};

</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Meeting
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8">

                 <MeetingInfoForm  :meeting = "meeting" :schedules = "schedules" :notifications="notifications" :can = "can" class="mt-10 sm:mt-0" >
                 </MeetingInfoForm>


              <div class="flex justify-end mt-5 ml-">
                <TabButton  @click="showOrganizerSection" >
                    Organizer
                </TabButton>

                <TabButton  @click="showContributorSection" >
                    Contributor
                </TabButton>


                <TabButton  @click="showAgendaSection" >
                    Agenda
                </TabButton>


                <TabButton  @click="showParticipantSection" >
                    Participant
                </TabButton>

                <TabButton  @click="showActionSection" >
                    Actions
                </TabButton>




            </div>



                 <SectionBorder />



            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <MeetingOrganizerForm
                       :can="can"
                       :users="users"
                       :organizers="organizers"
                       :meeting="meeting"
                       :user="$page.props.auth.user"
                       v-show="showMeetingOrganizerSection"
                       />


                    <MeetingAgendaContributorForm
                        :can="can"
                        :users="users"
                        :contributors="contributors"
                        :meeting="meeting"
                        :user="$page.props.auth.user"
                        v-show="showMeetingAgendaContributorSection"
                        />


                    <MeetingAgendaForm
                       :can="can"
                       :users="users"
                       :agendas="agendas"
                       :documents="documents"
                       :purposes = "purposes"
                       :meeting="meeting"
                       :user="$page.props.auth.user"
                       v-show="showMeetingAgendaSection" />

                   <ParticipantForm
                      :can="can"
                      :users="users"
                      :groups="groups"
                      :meeting_roles="meeting_roles"
                      :participants="participants"
                      :meeting="meeting"
                      :user="$page.props.auth.user"
                      v-show="showMeetingParticipantSection"
                      />

                      <ActionForm
                      :can="can"
                      :users="users"
                      :agendas="agendas"
                      :statuses="statuses"
                      :actions="actions"
                      :meeting="meeting"
                      :user="$page.props.auth.user"
                      v-show="showMeetingActionSection"
                      />


                </div>



        </div>
    </AppLayout>
</template>
