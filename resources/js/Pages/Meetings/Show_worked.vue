
<script setup>
import { ref } from "vue";
// import { Inertia } from "@inertiajs/inertia";
import { Head, Link, useForm } from "@inertiajs/vue3";
// import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import moment from "moment";

import AppLayout from "@/Layouts/AppLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import ShowSection from "@/Components/ShowSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";

// defineProps({});

const props = defineProps({
  meeting: Object,
});

</script>

<template>
    <AppLayout title="Meetings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Meeting Details
            </h2>
        </template>

        <div>
        
       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                <ShowSection>         

                    <template #description>

                    <div>



                        <div>
                         <Link :href="route('password.request')" class=" text-md text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                             Meeting Info
                          </Link>
                        </div>

                        <div>
                          <Link :href="route('password.request')" class=" text-md text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                             Organizer
                          </Link>
                        </div>

                        <div>
                          <Link :href="route('password.request')" class=" text-md text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                             Agenda Contributor
                          </Link>
                        </div>


                        <div>
                          <Link :href="route('password.request')" class=" text-md text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                             Participants
                          </Link>
                        </div>


                        <div>
                          <Link :href="route('password.request')" class=" text-md text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                             Additional Access
                          </Link>
                        </div>


                        <div>
                          <Link :href="route('password.request')" class=" text-md text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                             Agenda
                          </Link>
                        </div>

                        <div>
                          <Link :href="route('password.request')" class=" text-md text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                             Action
                          </Link>
                        </div>                  
           

                    </div>
                        
                    </template>

                    <template #table>

    


                        <div class="bg-white rounded-md shadow">
                            <table class="w-full whitespace-nowrap">
                                <tbody>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Meeting type           
                                    </td>
                                    <td class="border-t p-2">                                 
                                        {{ meeting.meeting_type}}                                            
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Meeting title           
                                    </td>
                                    <td class="border-t p-2">                                 
                                        {{ meeting.title }}                                            
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Meeting Schedule           
                                    </td>
                                    <td class="border-t p-2">                                 
                                        {{ moment(meeting.meeting_date).format('dddd, MMMM DD, YYYY') }} {{ moment(meeting.meeting_start_time, 'HH:mm:ss').format('hh:mm A') }} to {{ moment(meeting.meeting_end_time, 'HH:mm').format('hh:mm A') }}                                            
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Timezone          
                                    </td>
                                    <td class="border-t p-2">                                 
                                        {{ meeting.timezone_id }}                                            
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Venue           
                                    </td>
                                    <td class="border-t p-2">                                 
                                        {{ meeting.venue }}                                            
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Google map url           
                                    </td>
                                    <td class="border-t p-2">                                 
                                        {{ meeting.google_map_url }}                                            
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Reminder           
                                    </td>
                                    <td class="border-t p-2">                                 
                                        {{ meeting.reminder }}                                            
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Description          
                                    </td>
                                    <td class="border-t p-2">                                 
                                        {{ meeting.description }}                                            
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Notes for participants         
                                    </td>
                                    <td class="border-t p-2">                                 
                                        {{ meeting.participants_notes }}                                            
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Notes for participants         
                                    </td>
                                    <td class="border-t p-2">                                 
                                        {{ meeting.organizer_notes }}                                            
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t p-2">
                                        Status         
                                    </td>
                                    <td class="border-t p-2">                                 
                                        {{ meeting.status }}                                            
                                    </td>
                                </tr>
                                <tr v-if="meeting.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No meetings found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>

                        
                 
                         
  

                    </template>

                   
                    

                    
                </ShowSection>

                    <SectionBorder />

                </div>

                <FormSection>

                </FormSection>

            </div>
        </div>
    </AppLayout>
</template>

