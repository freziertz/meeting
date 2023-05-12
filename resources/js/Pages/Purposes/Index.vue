<script setup>
import { ref, reactive, watch } from "vue";
// import { Inertia } from "@inertiajs/vue3";
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import Pagination from "@/Components/Pagination.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Icon from "@/Components/Icon.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import SearchFilter from "@/Components/SearchFilter.vue";


const props = defineProps({
  filters: Object,
  purposes: Object,
})


const form = useForm({
    search: props.filters ?.search ??'',
    trashed: props.filters ?.trashed ?? null,
});

watch(
  () => form.search, // use a getter like this
  (search)=> {
    const options = { preserveState: true }
    console.log('seach parameter changed', search);
    form.get(route('purposes.index'), search, options);
  }
);

const reset = () => {
    form.search = '';
    form.trashed = null ;
}

</script>








<template>
    <AppLayout title="Purposes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Purposes
            </h2>
        </template>

        <div class="mx-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">


                           <div class="flex items-center justify-between mb-6">

                                <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
                                    <label class="block text-gray-700">Trashed:</label>
                                    <select v-model="form.trashed" class="form-select mt-1 w-full">
                                        <option :value="null" />
                                        <option value="with">With Trashed</option>
                                        <option value="only">Only Trashed</option>
                                    </select>
                                </search-filter>

                                <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" :href="`/purposes/create`">
                                    <span>Create</span>
                                    <span class="hidden md:inline">&nbsp;Purpose</span>
                                </Link>
                            </div>

                            <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                <tr class="text-left font-bold">
                                    <th class="pb-4 pt-6 px-6">Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="purpose in purposes.data" :key="purpose.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/purposes/${purpose.id}/edit`">
                                            {{ purpose.name }}
                                            <icon v-if="purpose.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>
                                    </td>
                                </tr>
                                <tr v-if="purposes.data.length === 0">
                                    <td class="px-6 py-4 border-t" colspan="4">No purposes found.</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <pagination class="mt-6" :links="purposes.links" />
                        </div>
                    <SectionBorder />
                </div>
    </AppLayout>
</template>
