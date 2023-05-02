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
import NotificationButton from '@/Components/NotificationButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DeleteButton from '@/Components/DeleteButton.vue';
// import DialogModal from '@/Components/DialogModal.vue';

const props = defineProps({
    users: Array,
    user: Object,
    sessions: Array,
    contributors: Array,
    meeting: Object,
    contributor:Object,
});


const showForm = ref(false);
const showMeetingOrganizer = ref(false);
const passwordInput = ref(null);
const confirmingContributorDeletion = ref(false);

const form = useForm({
    id:null,
    title: null,
    primary: false,
    contributor_id: null,
    meeting_id: props.meeting.id,
});


const createMeetingAgendaContributor = () => {
    form.post(route('contributors.store'), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        // onSuccess: () => clearPhotoFileInput(),
    });
};


const sendNotificationToContributors = () => {
    form.post(route('notifications.contributor', props.meeting.id), {
        preserveScroll: true,
    });
};

const showOrganizerForm = () => {
    return showForm.value = !showForm.value ;
};


// Delete Contributor


const confirmContributorDeletion = (contributor_id) => {
    confirmingContributorDeletion.value = true;

    // setTimeout(() => passwordInput.value.focus(), 250);
};

const deleteContributor = (id) => {
    form.delete(route('contributors.destroy', id), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        // onError: () => passwordInput.value.focus(),
        // onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingContributorDeletion.value = false;

    // form.reset();
};






</script>

<template>
    <ActionSection>

        <template #title>
            Agenda Contributors
        </template>

        <template #description>
            Manage Agenda Contributors
        </template>


        <template #content>


          <div class="flex justify-end">


               <NotificationButton @click="sendNotificationToContributors" >
                    Send Notification
                </NotificationButton>

         </div>

            <div class=" w-full text-sm text-gray-600">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                    <tr class="text-left font-bold">
                                        <th class="pb-4 pt-6 px-6">Contributor</th>
                                        <th class="pb-4 pt-6 px-6">Title</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="contributor in contributors" :key="contributor.id" class="hover:bg-gray-100 focus-within:bg-gray-100">


                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/contributors/${contributor.id}`">
                                            {{ contributor.first_name }} {{ contributor.last_name }}

                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/contributors/${contributor.id}`">
                                            {{ contributor.designation }}

                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <delete-button @delete="deleteContributor(`${contributor.contributor_id}`)">Delete</delete-button>
                                    </td>




                                </tr>
                                </tbody>
                    </table>
            </div>

            <button class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showOrganizerForm">
                <p v-show="!showForm">Add Meeting Agenda Contributor</p>
                <p v-show="showForm">Close Meeting Agenda Contributor</p>
            </button>







            <div v-show="showForm">

            <PartialFormSection @submitted="createMeetingAgendaContributor" >


              <template #form>









            <!-- User Id -->

            <div class="col-span-4 sm:col-span-3">


                <select
                   v-model="form.contributor_id"
                   :error="form.errors.contributor_id"
                   class="mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="User">

                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.first_name + " " + user.last_name}}</option>
                </select>


            </div>




            <!-- Meeting Id-->












            <!-- Title -->
            <div class="col-span-2 sm:col-span-2">

                <TextInput
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="title"
                />
                <InputError :message="form.errors.title" class="mt-2" />


            </div>



                          <TextInput
                    id="meeting_id"
                    v-model="form.meeting_id"
                    type="hidden"
                     />
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

                    <!-- Delete Account Confirmation Modal -->
            <DialogModal :show="confirmingContributorDeletion" @close="closeModal">
                <template #title>
                    Delete Account
                </template>

                <template #content>
                    Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.


                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteContributor"
                    >
                        Delete Contributor
                    </DangerButton>
                </template>
            </DialogModal>






        </template>
    </ActionSection>
</template>
