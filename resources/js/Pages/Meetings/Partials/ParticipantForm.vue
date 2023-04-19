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
import PartialFormSection from '@/Components/PartialFormSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    users: Array,
    user: Object,
    sessions: Array,
    contributors: Array,
    meeting: Object,
});

const confirmingLogout = ref(false);
const showForm = ref(false);
const showMeetingOrganizer = ref(false);
const passwordInput = ref(null);





const form = useForm({   
    title: null,
    primary: false,
    user_id: null,
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




const showOrganizerForm = () => { 
    return showForm.value = !showForm.value ;
};


const deleteOrganizer = () => {
    form.delete(route('current-user.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};






</script>

<template>
    <ActionSection>
        <template #title>
            Agenda Contributor
        </template>

        <template #description>    
                  <div>
                Manage agenda contributor            
                                       
           

                  </div>                       
                        

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
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/contributors/${contributor.id}`">
                                            {{ contributor.primary ? 'Yes' : 'No' }}
                                        
                                        </Link>
                                    </td>

                                </tr>
                                </tbody>
                    </table>
            </div>

            <button class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showOrganizerForm">
                <p v-show="!showForm">Add Meeting Organizer</p> 
                <p v-show="showForm">Close Meeting Organizer</p>           
            </button>

            <SectionBorder />

        

        

            <div v-show="showForm">

            <PartialFormSection @submitted="createMeetingAgendaContributor" >


              <template #form>




       
                   
        

            <!-- User Id -->

            <div class="col-span-6 sm:col-span-4">
            <InputLabel for="user_id" value="Select user" />
            
                <select 
                   v-model="form.user_id" 
                   :error="form.errors.user_id" 
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="User">

                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.first_name + " " + user.last_name}}</option>
                </select>

    
            </div>

   


            <!-- Meeting Id-->

 
            
              
                <TextInput
                    id="meeting_id"
                    v-model="form.meeting_id"
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
