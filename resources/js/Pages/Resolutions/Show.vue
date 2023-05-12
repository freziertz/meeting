<script setup>
import { ref,computed } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
// import DeleteUserForm from '@/Pages/Resolutions/Partials/DeleteUserForm.vue';
// import LogoutOtherBrowserSessionsForm from '@/Pages/Resolutions/Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';

import TabButton from '@/Components/TabButton.vue';
import DeleteButton from '@/Components/DeleteButton.vue';


import ResolutionInfoForm from '@/Pages/Resolutions/Partials/ResolutionInfoForm.vue';
import ResolutionAgendaForm from '@/Pages/Resolutions/Partials/ResolutionAgendaForm.vue';
import VoterForm from '@/Pages/Resolutions/Partials/VoterForm.vue';
import ResolutionOrganizerForm from '@/Pages/Resolutions/Partials/ResolutionOrganizerForm.vue';

// import UpdatePasswordForm from '@/Pages/Resolutions/Partials/UpdatePasswordForm.vue';
// import UpdateProfileInformationForm from '@/Pages/Resolutions/Partials/UpdateProfileInformationForm.vue';



defineProps({
    resolution: Object,
    users: Array,
    groups: Array,
    purposes: Array,
    organizers:Array,
    agendas:Array,
    statuses:Array,
    documents:Array,
    voters: Array,
    notifications: Array
});


const showResolutionOrganizerSection = ref(false);
const showResolutionAgendaSection = ref(false);
const showResolutionVoterSection = ref(false);



const preserveScroll = ref(false);


const showOrganizerSection = () => {

    showResolutionAgendaSection.value = false;
    showResolutionVoterSection.value = false;
    preserveScroll: true;
    return showResolutionOrganizerSection.value = !showResolutionOrganizerSection.value ;
};

const showAgendaSection = () => {
    showResolutionOrganizerSection.value = false;
    showResolutionVoterSection.value = false;
    return showResolutionAgendaSection.value = !showResolutionAgendaSection.value ;
};


const showVoterSection = () => {
     showResolutionOrganizerSection.value = false;
     showResolutionAgendaSection.value = false;
     preserveScroll: true;
    return showResolutionVoterSection.value = !showResolutionVoterSection.value;
};

</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Resolution
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8">

                 <ResolutionInfoForm  :resolution = "resolution" :schedules = "schedules" :notifications="notifications" class="mt-10 sm:mt-0" >
                 </ResolutionInfoForm>


              <div class="flex justify-end mt-5 ml-">
                <TabButton @click="showOrganizerSection" >
                    Organizer
                </TabButton>

                <TabButton @click="showAgendaSection" >
                    Agenda
                </TabButton>

                <TabButton @click="showVoterSection" >
                    Voter
                </TabButton>

            </div>

                 <SectionBorder />

            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <ResolutionOrganizerForm
                       :users="users"
                       :organizers="organizers"
                       :resolution="resolution"
                       :user="$page.props.auth.user"
                       v-show="showResolutionOrganizerSection"
                       />

                    <ResolutionAgendaForm
                       :users="users"
                       :agendas="agendas"
                       :documents="documents"
                       :purposes = "purposes"
                       :resolution="resolution"
                       :user="$page.props.auth.user"
                       v-show="showResolutionAgendaSection" />

                   <VoterForm
                      :users="users"
                      :groups="groups"
                      :voters="voters"
                      :resolution="resolution"
                      :user="$page.props.auth.user"
                      v-show="showResolutionVoterSection"
                      />

                </div>

        </div>
    </AppLayout>
</template>
