<script setup>
import { ref } from "vue";
// import { Inertia } from "@inertiajs/vue3";
import { Head, Link, useForm, router } from "@inertiajs/vue3";
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
import NavLink from "@/Components/NavLink.vue";
import DeleteButton from "@/Components/DeleteButton.vue";

const props = defineProps({
  actions: Array,
  url_prefix: String,
});

const deleteAction = (id) => {
  router.delete(route("actions.destroy", id), {
    preserveScroll: true,
    onFinish: () => form.reset(),
  });
};
</script>
<template>
    <AppLayout title="Announcements">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Announcements
            </h2>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                            <!-- <Head title="Announcements" /> -->
                            <!-- <h1 class="mb-8 text-3xl font-bold">Announcements</h1> -->
                           <div class="flex items-center justify-between mb-6">
                                <!-- <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
                                    <label class="block text-gray-700">Trashed:</label>
                                    <select v-model="form.trashed" class="form-select mt-1 w-full">
                                    <option :value="null" />
                                    <option value="with">With Trashed</option>
                                    <option value="only">Only Trashed</option>
                                    </select>
                                </search-filter> -->
                                <NavLink class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" :href="`/announcements/create`">
                                    <span>Create</span>
                                    <span class="hidden md:inline">&nbsp;Action</span>
                                </NavLink>
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">

                                <table class="w-full whitespace-nowrap">
                                <thead>
                                    <tr class="text-left font-bold">
                                        <th class="pb-4 pt-6 px-6">Action</th>
                                        <th class="pb-4 pt-6 px-6">Responsible</th>
                                        <th class="pb-4 pt-6 px-6">Due Date</th>
                                        <th class="pb-4 pt-6 px-6">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="action in actions" :key="action.id" class="hover:bg-gray-100 focus-within:bg-gray-100">


                                    <td class="border-t">
                                        <NavLink class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/actions/${action.id}`">
                                            {{ action.name }}

                                        </NavLink>
                                    </td>

                                    <td class="border-t">
                                        <NavLink class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/actions/${action.id}`">
                                            {{ action.first_name }} {{ action.last_name }}

                                        </NavLink>
                                    </td>


                                    <td class="border-t">
                                        <NavLink class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/actions/${action.id}`">
                                            {{ action.due_date }}

                                        </NavLink>
                                    </td>







                                    <td class="border-t">

                                    <delete-button  @delete="deleteAction(`${action.id}`)">Delete</delete-button>

                                    </td>

                                </tr>
                                </tbody>
                    </table>
                            </div>
                            <pagination class="mt-6" :links="actions.links" />
                        </div>
                    <SectionBorder />
                </div>
    </AppLayout>
</template>
