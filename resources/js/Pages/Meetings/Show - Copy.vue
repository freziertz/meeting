<script setup>
import { ref } from "vue";
// import { Inertia } from "@inertiajs/vue3";
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
// import Pagination from "@/Components/Pagination.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
  meeting: Object,
});
</script>
<template>
    <AppLayout title="Meetings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Meetings
            </h2>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                        <Head title="Meetings" />



                            <!-- <h1 class="mb-8 text-3xl font-bold">Meetings</h1> -->
                           <div class="flex items-center justify-between mb-6">
                                <!-- <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
                                    <label class="block text-gray-700">Trashed:</label>
                                    <select v-model="form.trashed" class="form-select mt-1 w-full">
                                    <option :value="null" />
                                    <option value="witd">Witd Trashed</option>
                                    <option value="only">Only Trashed</option>
                                    </select>
                                </search-filter> -->


                                <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" :href="`/meetings/create`">
                                    <span>Create</span>
                                    <span class="hidden md:inline">&nbsp;Meeting</span>
                                </Link>


                                <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" :href="`/meetings/create`">
                                    <span>Create</span>
                                    <span class="hidden md:inline">&nbsp;Meeting</span>
                                </Link>

                                <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" :href="`/meetings/create`">
                                    <span>Create</span>
                                    <span class="hidden md:inline">&nbsp;Meeting</span>
                                </Link>
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <tdead>

                                
                                </tdead>
                                <tbody>
                                <tr class="hover:bg-gray-100 focus-witdin:bg-gray-100">
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        Meeiting type
                                    </td>
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        {{ meeting.meeting_type_id }}
                                    </td>                        
                                </tr>

                                <tr class="hover:bg-gray-100 focus-witdin:bg-gray-100">
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        Meeiting title
                                    </td>
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        {{ meeting.title }}
                                    </td>                        
                                </tr>

                                <tr class="hover:bg-gray-100 focus-witdin:bg-gray-100">
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        Schedule
                                    </td>
                                    <td class="pb-2 pt-2 ">
                                        {{ meeting.schedule}}
                                    </td>                        
                                </tr>

                                <tr class="hover:bg-gray-100 focus-witdin:bg-gray-100">
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        Timezone
                                    </td>
                                    <td class="pb-2 pt-2  ">
                                        {{ meeting.timezone }}
                                    </td>                        
                                </tr>


                                <tr class="hover:bg-gray-100 focus-witdin:bg-gray-100">
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        Venue
                                    </td>
                                    <td class="pb-2 pt-2 ">
                                        {{ meeting.venue}}
                                    </td>                        
                                </tr>


                                <tr class="hover:bg-gray-100 focus-witdin:bg-gray-100">
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        Google map URL
                                    </td>
                                    <td class="pb-2 pt-2 ">
                                        {{ meeting.google_map_url }}
                                    </td>                        
                                </tr>

                                <tr class="hover:bg-gray-100 focus-witdin:bg-gray-100">
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        Send Reminder
                                    </td>
                                    <td class="pb-2 pt-2">
                                        {{ meeting.reminder }}
                                    </td>                        
                                </tr>


                                <tr class="hover:bg-gray-100 focus-witdin:bg-gray-100">
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        Description
                                    </td>
                                    <td class="pb-2 pt-2">
                                        {{ meeting.description }}
                                    </td>                        
                                </tr>


                                <tr class="hover:bg-gray-100 focus-witdin:bg-gray-100">
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        Notes for Participants
                                    </td>
                                    <td class="pb-2 pt-2 ">
                                        {{ meeting.participants_notes }}
                                    </td>                        
                                </tr>

                                <tr class="hover:bg-gray-100 focus-witdin:bg-gray-100">
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        Notes for organizer
                                    </td>
                                    <td class="pb-2 pt-2">
                                        {{ meeting.organizer_notes }}
                                    </td>                        
                                </tr>

                                <tr class="hover:bg-gray-100 focus-witdin:bg-gray-100">
                                    <td class="pb-2 pt-2 bg-gray-50">
                                        Status
                                    </td>
                                    <td class="pb-2 pt-2 ">
                                        {{ meeting.status }}
                                    </td>                        
                                </tr>

                                <tr v-if="meeting.lengtd === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No meetings found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                           
                        </div>
                    <SectionBorder />
                </div>
    </AppLayout>
</template>