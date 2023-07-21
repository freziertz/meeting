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
    can: Object,
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


const deleteParticipant = (id, participantable_type) => {
    form.delete(route('participants.destroy', {id, participantable_type}), {
        preserveScroll: true,
    });
};






</script>
<template>

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

                                    <delete-button v-if="can.organize_meeting" @delete="deleteParticipant(`${participant.id}`, `${participant.participantable_type}` )">Delete</delete-button>

                                    </td>

                                </tr>
                                </tbody>
                    </table>
            </div>

</template>

