<script setup>
import { ref,computed } from 'vue';

import { Head, Link, useForm } from "@inertiajs/vue3";

import MeetingLayout from '@/Layouts/MeetingLayout.vue';

import SectionBorder from '@/Components/SectionBorder.vue';

import TabButton from '@/Components/TabButton.vue';
import DocumentInfoForm from '@/Pages/Live/Partials/DocumentInfoForm.vue';



import MeetingInfoForm from '@/Pages/Meetings/Partials/MeetingInfoForm.vue';
import MeetingAgendaForm from '@/Pages/Meetings/Partials/MeetingAgendaForm.vue';
import ParticipantForm from '@/Pages/Meetings/Partials/ParticipantForm.vue';
import ActionForm from '@/Pages/Meetings/Partials/ActionForm.vue';
import MeetingAgendaContributorForm from '@/Pages/Meetings/Partials/MeetingAgendaContributorForm.vue';

import MeetingOrganizerForm from '@/Pages/Meetings/Partials/MeetingOrganizerForm.vue';
import TwoFactorAuthenticationForm from '@/Pages/Meetings/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Meetings/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Meetings/Partials/UpdateProfileInformationForm.vue';




const props = defineProps({

    user: Object,
    sessions: Array,
    agendas: Array,
    documents:Array,
    document: Object,
    minute: Object,
    participants:Array,
    meeting: Object,
    agenda: Object,
    statuses:Array,
    actions:Array,
    pdfFile: String,
    can: Object,
});





</script>

<template>
    <MeetingLayout
        title="Live Meeting"
        :user="user"
        :actions="actions"
        :agendas="agendas"
        :documents="documents"
        :participants="participants"
        :statuses="statuses"
        :meeting="meeting"
        :document="document"
        :minute="minute"
        :agenda="agenda"
        :session="session"
        :can="can"

        >

        <DocumentInfoForm  :document = "document"  class="mt-10 sm:mt-0" />




    </MeetingLayout>
</template>
