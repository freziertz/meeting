<script setup>
import { ref ,watch, } from "vue";
// import { Inertia, } from "@inertiajs/inertia";

import { Head, Link, useForm, router } from '@inertiajs/vue3';
// import { Head, Link, useForm, router} from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import Pagination from "@/Components/Pagination.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import SearchFilter from "@/Components/SearchFilter.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";


const props = defineProps({
    filters: Object,
    users: Object,
});



const form = ref({
    search: props.filters.search,
    trashed: props.filters.trashed,
})

let timerId = null

watch(form, function (newForm) {
  clearTimeout(timerId)
  timerId = setTimeout(() => {
    const queryParams = {}
    for (const key in newForm) {
      if (newForm[key] !== null) {
        queryParams[key] = newForm[key]
      }
    }
    const options = { preserveState: true }
    router.get('/users', queryParams, options)
  }, 150)
}, { deep: true })

// const reset = () => {
//   form.value = mapValues(form.search.value, () => null)
// }

const reset = () => {
  for (const key in form.value) {
    form.value[key] = null
  }
}

</script>
<template>
    <AppLayout title="Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                            <Head title="Users" />
                            <h1 class="mb-8 text-3xl font-bold">Users</h1>
                           <div class="flex items-center justify-between mb-6">
                                <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
                                    <label class="block text-gray-700">Trashed:</label>
                                    <select v-model="form.trashed" class="form-select mt-1 w-full">
                                    <option :value="null" />
                                    <option value="with">With Trashed</option>
                                    <option value="only">Only Trashed</option>
                                    </select>
                                </search-filter>
                                <NavLink class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="/users/create" >
                                    <span>Create</span>
                                    <span class="hidden md:inline">&nbsp;User</span>
                                </NavLink>
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                <tr class="text-left font-bold">
                                    <th class="pb-4 pt-6 px-6">Name</th>
                                    <th class="pb-4 pt-6 px-6">Designation</th>
                                    <th class="pb-4 pt-6 px-6">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="user in users.data" :key="user.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t">
                                        <NavLink class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/users/${user.id}/edit`">
                                            {{ user.name }}
                                            <icon v-if="user.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </NavLink>
                                    </td>
                                    <td class="border-t">
                                        <NavLink class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/users/${user.id}/edit`">
                                            {{ user.designation }}
                                            <icon v-if="user.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </NavLink>
                                    </td>
                                    <td class="border-t">
                                        <NavLink class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/users/${user.id}/edit`">
                                            {{ user.email }}
                                            <icon v-if="user.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </NavLink>
                                    </td>
                                </tr>
                                <tr v-if="users.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No users found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <pagination class="mt-6" :links="users.links" />
                        </div>
                    <SectionBorder />
                </div>
    </AppLayout>
</template>
