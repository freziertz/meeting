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


import ResolutionOrganizerForm from '@/Pages/Resolutions/Partials/ResolutionOrganizerForm.vue';

const props = defineProps({
    sessions: Array,
    resolution: Object,
    users: Array,
    organizers:Array,
    schedules: Array,
    notifications:Array
});

const confirmingLogout = ref(false);
const passwordInput = ref(null);




const resolutionStatus = computed(() => {


   switch (props.resolution.status){
   case 1:
       return 'UnPublished' // Uncirculated
       break;

    case 2:
       return 'Published'  //  Circulated
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
    id: props.resolution.id,
    status: props.resolution.status,

});

const formEdit = useForm({
    // id: props.resolution.id,

});

const publishResolution = () => {
    form.status =  2;
    form.post(route('resolution.status', props.resolution.id), {
        preserveScroll: true,
    });
};


const startResolution = () => {
    form.status =  3;
    form.post(route('resolution.status', props.resolution.id), {
        preserveScroll: true,
    });
};

const closeResolution = () => {
    form.status =  4;
    form.post(route('resolution.status', props.resolution.id), {
        preserveScroll: true,
    });
};


const resetResolution = () => {
    form.status =  1;
    form.post(route('resolutions.status', props.resolution.id), {
        preserveScroll: true,
    });
};

const scheduleNextResolution = () => {
    formEdit.get(route('resolutions.next', props.resolution.id), {
        preserveScroll: true,
    });
};

const exportDraftResolution = () => {
    formEdit.get(route('resolutions.edit', props.resolution.id), {
        preserveScroll: true,
    });
};

const exportSendResolution = () => {
    formEdit.get(route('resolutions.edit', props.resolution.id), {
        preserveScroll: true,
    });
};

const editResolution = () => {
    formEdit.get(route('resolutions.edit', props.resolution.id), {
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
            Resolution Info
        </template>

        <template #description>




        </template>

        <template #content>

            <div class="flex space-x-2 mb-2 justify-end">

               <NotificationButton @click="scheduleNextResolution" >
                    Schedule Next Resolution
               </NotificationButton>
               <EditButtonLink @click="exportDraftMinutes" >
                    Export Draft Minutes
                </EditButtonLink>
               <NotificationButton @click="sendExportResolutionPack" >
                    Export/ Send Resolution Pack
               </NotificationButton>
               <EditButtonLink @click="editResolution" >
                    Edit
                </EditButtonLink>
            </div>
            <div class=" w-full text-sm text-gray-600">
                            <table class="w-full whitespace-nowrap">
                                <tbody>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Subject
                                    </td>
                                    <td class="border-t p-2">
                                        {{ resolution.subject }}
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Notes to Voters
                                    </td>
                                    <td class="border-t p-2">
                                        {{ resolution.notes_to_voters }}
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Resolution Schedule
                                    </td>
                                    <td class="border-t p-2">
                                        {{ moment(resolution.voting_deadline).format('dddd, MMMM DD, YYYY') }}
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
                                        Status
                                    </td>
                                    <td class="border-t p-2">
                                        {{ resolution.status }}
                                    </td>
                                </tr>
                                <tr v-if="resolution.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No resolutions found.</td>
                                </tr>
                                </tbody>
                            </table>
            </div>



            <div class="flex items-center mt-5" v-show="resolutionStatus ==='UnPublished'">
                <PrimaryButton @click="publishResolution" >
                    Circulate
                </PrimaryButton>

                <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                    Done.
                </ActionMessage>
            </div>


            <div class="flex items-center mt-5" v-show="resolutionStatus ==='Published'">
                <PrimaryButton @click="startResolution" >
                    Start Resolution
                </PrimaryButton>

                <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                    Done.
                </ActionMessage>
            </div>


            <div class="flex items-center mt-5" v-show="resolutionStatus ==='Progress'">
                <PrimaryButton @click="closeResolution" >
                    Close Resolution
                </PrimaryButton>

                <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                    Done.
                </ActionMessage>
            </div>



            <div class="flex items-center mt-5" >
                <PrimaryButton @click="resetResolution" >
                    Reset Resolution
                </PrimaryButton>

                <ActionMessage :on="form.recentlySuccessful" class="ml-3">
                    Done.
                </ActionMessage>
            </div>

        </template>


    </ActionSection>
</template>
