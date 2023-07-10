<script setup>
import { ref, watch } from "vue";
// import { Inertia } from "@inertiajs/vue3";
import { Head, Link, useForm, router } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";

import moment from "moment";
import Pagination from "@/Components/Pagination.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

import SearchFilter from "@/Components/SearchFilter.vue";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
  agendas: Array,
  documents: Array,
  meeting_date: String,
  filters: Object,
  url_prefix: String,
  can: Object,
});

</script>
<template>
    <AppLayout title="Meetings">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Agendas on Review
            </h1>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                    <Head title="Agenda on review" />

                 <div class="bg-white text-sm rounded-md shadow overflow-x-auto">


                    <ol class="flex flex-col  ">


                        <li  v-for="(agenda, index) in props.agendas" :key="agenda.id"  class="mx-2 pl-2 text-lg font-medium p-2 border-b hover:bg-slate-100  focus-within:bg-gray-100">
                            {{ index + 1 }} . {{ agenda.title }}
                            <div class="flex flex-row space-x-2 text-gray-500 text-xs font-thin">
                                <div>{{ agenda.pfirst_name + ' ' +  agenda.plast_name }}</div>
                                <div> for {{ agenda.purpose_name }}</div>
                                <div> - {{ agenda.minutes }} Minutes</div>
                            </div>

                                <ol  class="align-top mt-2">
                                    <li v-for="document in props.documents" :key="document.id" class="mx-2 px-2 ">
                                        <!-- <NavLink v-if="document.agenda_id == agenda.id" class="flex items-center px-2 py-1  focus:text-indigo-500 align-top " :href="`/documents/${document.id}`"> -->
                                            <!-- route('named.route', ['category' => $category->id, 'item' => $item->id]); -->



                                        <NavLink v-if="document.agenda_id == agenda.id" class="flex items-center px-2 py-1  text-sm  focus:text-indigo-500" :href="`/reviews/${document.id}`">
                                                        <img :src="`http://localhost:8000/storage/icons/${document.extension}.png`" class="image-fluid w-4 mr-2">
                                                            {{ document.name }}
                                                            <icon v-if="document.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </NavLink>
                                    </li>

                                </ol>

                        </li>

                    </ol>

                </div>


                </div>
          </div>
























    </AppLayout>
</template>
