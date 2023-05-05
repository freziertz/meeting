<script setup>
import { ref, onMounted} from "vue";
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
import SearchFilter from "@/Components/SearchFilter.vue";

//datatable
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
import 'datatables.net-select';
import 'datatables.net-responsive';

DataTable.use(DataTablesCore);


let counter = 0;
let dt;
const table = ref();

onMounted(function () {
  dt = table.value.dt;
});



const props = defineProps({
  users: Array,
//   filters: Object,
//   url_prefix: String,
});

const data = props.users;



const columns = [

  { data: 'name' },
  { data: 'designation' },
  { data: 'email' },
];

const options = {

  responsive: true,
  select: true,
  info:true,

  buttons: [
        'copy', 'excel', 'pdf'
    ]

};


// const data = props.users;

const form = ({

})
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

                <div class="flex frex-row space-x-2 ">

                <PrimaryButton class="mb-2" @click="add">Add new row</PrimaryButton><br />
                <PrimaryButton class="mb-2" @click="update">Update selected rows</PrimaryButton><br />
                <PrimaryButton  class="mb-2" @click="remove">Delete selected rows</PrimaryButton>

            </div>

                <div class="bg-white rounded-md shadow overflow-x-auto">

                <DataTable
                :data="data"
                :columns="columns"
                :options="options"
                ref="table"
                class="display ">
                    <thead>
                        <tr>
                            <th class="text-left">Name</th>
                            <th class="text-left">Desination</th>
                            <th class="text-left">Email</th>
                        </tr>
                    </thead>
                </DataTable>

                </div>




            </div>

        </div>
    </AppLayout>
</template>

<style>
@import 'datatables.net-dt';
</style>




