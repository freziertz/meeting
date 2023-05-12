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
    user: Object,
    sessions: Array,
    voters: Array,
    resolution: Object,
});

const confirmingLogout = ref(false);
const showForm = ref(false);
const showResolutionVoter = ref(false);
const passwordInput = ref(null);





const form = useForm({
    title: null,
    voter_id: null,
    participantable_type: 'Resolution',
    resolution_id: props.resolution.id,
});


const createResolutionVoter = () => {
    form.post(route('participants.store'), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        // onSuccess: () => clearPhotoFileInput(),
    });
};


const sendNotificationToVoters = () => {
    form.post(route('notifications.voter', props.resolution.id), {
        preserveScroll: true,
    });
};

const checkScheduleConflict = () => {
    form.post(route('schedules.conflict', props.resolution.id), {
        preserveScroll: true,
    });
}




const showVoterForm = () => {
    return showForm.value = !showForm.value ;
};


const deleteVoter = (id) => {
    form.delete(route('participants.destroy', id), {
        preserveScroll: true,
        // onSuccess: () => closeModal(),

    });
};






</script>

<template>
    <ActionSection>
        <template #title>
            Voters
        </template>

        <template #description>
            Manage Voters
        </template>

        <template #content>

        <div class="flex space-x-2 justify-end">
                <CalendarButton @click="checkScheduleConflict" >
                    Check Schedule Conflict
                </CalendarButton>
               <NotificationButton @click="sendNotificationToVoters" >
                    Send Notification
               </NotificationButton>
         </div>

            <div class=" w-full text-sm text-gray-600">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                    <tr class="text-left font-bold">
                                        <th class="pb-4 pt-6 px-6">Voter</th>
                                        <th class="pb-4 pt-6 px-6">Title</th>
                                        <th class="pb-4 pt-6 px-6">Vote</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="voter in voters" :key="voter.id" class="hover:bg-gray-100 focus-within:bg-gray-100">


                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/voters/${voter.id}`">
                                            {{ voter.first_name }} {{ voter.last_name }}

                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/voters/${voter.id}`">
                                            {{ voter.designation }}

                                        </Link>
                                    </td>

                                    <td class="border-t">
                                    <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/voters/${voter.id}`">
                                            {{ voter.vote }}

                                        </Link>
                                    </td>


                                    <td class="border-t">

                                    <delete-button @delete="deleteVoter(`${voter.id}`)">Delete</delete-button>

                                    </td>

                                </tr>
                                </tbody>
                    </table>
            </div>

            <button class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showVoterForm">
                <p v-show="!showForm">Add Resolution Voter</p>
                <p v-show="showForm">Close Resolution Voter</p>
            </button>

            <SectionBorder />





            <div v-show="showForm">

            <PartialFormSection @submitted="createResolutionVoter" >


              <template #form>








            <!-- User Id -->

            <div class="col-span-6 sm:col-span-4">
            <InputLabel for="user_id" value="Select user" />

                <select
                   v-model="form.voter_id"
                   :error="form.errors.voter_id"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="User">

                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.first_name + " " + user.last_name}}</option>
                </select>


            </div>

            <!-- Resolution Id-->




                <TextInput
                    id="resolution_id"
                    v-model="form.resolution_id"
                    type="hidden"
                     />


                <TextInput
                id="organizable_type"
                v-model="form.participantable_type"
                type="hidden"
                    />








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
