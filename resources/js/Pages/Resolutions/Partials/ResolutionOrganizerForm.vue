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
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DeleteButton from '@/Components/DeleteButton.vue';

const props = defineProps({
    users: Array,
    user: Object,
    sessions: Array,
    organizers: Array,
    resolution: Object,
});

const confirmingLogout = ref(false);
const showForm = ref(false);
const showResolutionOrganizer = ref(false);
const passwordInput = ref(null);





const form = useForm({
    title: null,
    primary: false,
    organizer_id: null,
    organizable_type: "Resolution",
    resolution_id: props.resolution.id,
});


const createResolutionOrganizer = () => {
    form.post(route('organizers.store'), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        // onSuccess: () => clearPhotoFileInput(),
    });
};




const showOrganizerForm = () => {
    return showForm.value = !showForm.value ;

};


const deleteOrganizer = ( organizer_id) => {
    form.delete(route('organizers.destroy', organizer_id), {
        preserveScroll: true,
        // onSuccess: () => closeModal(),

        // onFinish: () => form.reset(),
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
            Organizers
        </template>

        <template #description>
            Manage Organizers
        </template>

        <template #content>




            <div class=" w-full text-sm text-gray-600">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                    <tr class="text-left font-bold">
                                        <th class="pb-4 pt-6 px-6">Organizer</th>
                                        <th class="pb-4 pt-6 px-6">Title</th>
                                        <th class="pb-4 pt-6 px-6">Primary?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="organizer in organizers" :key="organizer.id" class="hover:bg-gray-100 focus-within:bg-gray-100">


                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/organizers/${organizer.id}`">
                                            {{ organizer.first_name }} {{ organizer.last_name }}

                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/organizers/${organizer.id}`">
                                            {{ organizer.designation }}

                                        </Link>
                                    </td>


                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/organizers/${organizer.id}`">
                                            {{ organizer.primary ? 'Yes' : 'No' }}

                                            {{ organizer.id }}



                                        </Link>
                                    </td>

                                   <td class="border-t">

                                    <delete-button @delete="deleteOrganizer(`${organizer.organizer_id}`)">Delete</delete-button>

                                    </td>

                                </tr>
                                </tbody>
                    </table>
            </div>

            <button class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showOrganizerForm">
                <p v-show="!showForm">Add Resolution Organizer</p>
                <p v-show="showForm">Close Resolution Organizer</p>
            </button>

            <SectionBorder />





            <div v-show="showForm">

            <PartialFormSection @submitted="createResolutionOrganizer" >


              <template #form>








            <!-- User Id -->

            <div class="col-span-6 sm:col-span-4">

            <InputLabel for="user_id" value="Select user" />

                <select
                   v-model="form.organizer_id"
                   :error="form.errors.organizer_id"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="User">

                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.first_name + " " + user.last_name}}</option>
                </select>


            </div>


            <!-- Primary -->




            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.primary" name="primary" />
                    <span class="ml-2 text-sm text-gray-600">Primary</span>
                </label>
            </div>




            <!-- Resolution Id-->




                <TextInput
                    id="resolution_id"
                    v-model="form.resolution_id"
                    type="hidden"
                     />

                     <TextInput
                    id="organizable_type"
                    v-model="form.organizable_type"
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
