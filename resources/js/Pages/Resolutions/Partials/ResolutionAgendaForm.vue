<script setup>
import { ref,computed, reactive } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import moment from "moment";
import ActionMessage from '@/Components/ActionMessage.vue';
import ActionSection from '@/Components/ActionSection.vue';
import DialogModal from '@/Components/DialogModal.vue';
import Checkbox from '@/Components/Checkbox.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PartialFormSection from '@/Components/PartialFormSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DeleteButton from '@/Components/DeleteButton.vue';
import EditButton from '@/Components/EditButton.vue';
import CalendarButton from '@/Components/CalendarButton.vue';
import NotificationButton from '@/Components/NotificationButton.vue';







// Import Vue FilePond
import vueFilePond from "vue-filepond";



// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";



// Import FilePond styles
import "filepond/dist/filepond.min.css";


// Import image preview plugin styles
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";










// Create component
const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);








const props = defineProps({
    users: Array,
    user: Object,
    sessions: Array,
    agendas: Array,
    purposes: Array,
    documents:Array,
    resolution: Object,

});


const showCreateForm = ref(false);
const showEditForm = ref(false);
const showResolutionParticipant = ref(false);


const pond = ref(['index.html']);


const form = useForm({
    id: null,
    title: null,
    presenter_id: null,
    contributor_id: null,
    purpose_id: null,
    external_url: null,
    recurring: false,
    minutes: null,
    photo: [],
    agendable_type: 'Resolution',
    resolution_id: props.resolution.id,
});

// let formEdit = useForm({
//     _method: 'PUT',
//     id: agendaOnEdit.id,
//     title: agendaOnEdit.title,
//     presenter_id: agendaOnEdit.title,
//     contributor_id: agendaOnEdit.title,
//     purpose_id: agendaOnEdit.title,
//     external_url: agendaOnEdit.title,
//     recurring: agendaOnEdit.title,
//     minutes: agendaOnEdit.title,
//     photo: [],
//     resolution_id: props.resolution.id,
// });


const createResolutionAgenda = () => {
    form.post(route('agendas.store'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        // onSuccess: () => form.reset(),
        // onSuccess: () => clearPhotoFileInput(),
    });
};

const handleFilePondInit =()=> {
    console.log('FilePond has initialized');

    // console.log(pond.value.getFiles());
};

const onProcessFile = (error, file) => {
      console.log('file processed', { error, file })
    };

const onAddFile = (error, file) => {
      console.log('file added', { error, file })

      // form.photo.push(file.file);

      // console.log('Form photo items is ', form.photo)
};

const updateFilePond = (files) => {

    console.log('FilePond updated');

    form.photo = files.map(files => files.file);

};


const showAgendaCreateForm = () => {
    showEditForm.value = false;
    return showCreateForm.value = !showCreateForm.value ;
};

const showAgendaEditForm = () => {

    showCreateForm.value = false;

    return showEditForm.value = !showEditForm.value;
};


const deleteAgenda = (id) => {
    form.delete(route('agendas.destroy', id), {
        preserveScroll: true,
        // onSuccess: () => closeModal(),
        // onError: () => passwordInput.value.focus(),
        // onFinish: () => form.reset(),
    });
};

const editAgenda = (id) => {

    agendaOnEdit =    props.agendas.filter(agenda => agenda.id == id);

    agendaOnEdit = Object.assign({}, ...agendaOnEdit );
    console.log('this is test ' + JSON.stringify(agendaOnEdit));






    showAgendaEditForm();

    return agendaOnEdit;


};





// const agendaSelected = computed(() => {

//     return props.agendas.filter(agenda => agenda.id == id);


// });




const updateResolutionAgenda = () => {
    _method: 'PUT',
    formEdit.post(route("agendas.update", formEdit.id), {
    // onFinish: () => showEditForm.value = false,
  });
};


const showAgenda = (id) => {
    formEdit.get(route('agendas.edit', id), {
        preserveScroll: true,
    });
};

</script>

<template>
    <ActionSection>

        <template #title>
            Documents
        </template>

        <template #description>
            Manage Documents
        </template>


        <template #content>
            <div class="flex space-x-2 justify-end">
                <CalendarButton @click="deliveryStatus" >
                    Delivery Status
                </CalendarButton>
               <NotificationButton @click="addVote" >
                    Add Vote
               </NotificationButton>

               <CalendarButton @click="permissions" >
                    Permissions
                </CalendarButton>
               <NotificationButton @click="documentOptions" >
                    Options
               </NotificationButton>
         </div>

            <div class="text-sm text-gray-600 ">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                    <div>
                                    <tr class="text-left font-bold">

                                        <th class="pb-4 pt-6 px-6">No</th>
                                        <th class="pb-4 pt-6 px-6">Title</th>
                                        <th class="pb-4 pt-6 px-6">Status</th>
                                    </tr>
                                </div>
                                </thead>
                                <tbody>
                                <tr v-for="( agenda, index) in agendas" :key="agenda.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                  <div>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/agendas/${agenda.id}`">
                                            {{ index +1 }}

                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/agendas/${agenda.id}`">
                                            {{ agenda.title }}

                                        </Link>
                                    </td>




                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/agendas/${agenda.id}`">
                                            {{  }}

                                        </Link>
                                    </td>





                                    <td class="border-t">

                                    <edit-button @submit="editAgenda(`${agenda.id}`)">Edit</edit-button>

                                    <delete-button @delete="deleteAgenda(`${agenda.id}`)">Delete</delete-button>

                                    </td>

                                </div>









                                    <div v-for="(document) in documents" :key="document.id">


                                        <Link v-if="document.agenda_id == agenda.id" class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/documents/${document.id}`">
                                        <img :src="`http://localhost:8000/storage/icons/${document.extension}.png`" class="image-fluid w-4 mr-2">
                                            {{ document.name }}
                                            <icon v-if="document.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                                        </Link>

                                    </div>





                                </tr>
                                </tbody>
                    </table>
            </div>

            <button class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showAgendaCreateForm">
                <p v-show="!showCreateForm">Add Agenda</p>
                <p v-show="showCreateForm">Close Agenda Form</p>
            </button>

            <SectionBorder />





            <div v-show="showCreateForm">

            <PartialFormSection @submitted="createResolutionAgenda" >


              <template #form>




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
            </div>



            <!-- Presenter Id -->

            <div class="col-span-6 sm:col-span-4">
            <InputLabel for="presenter_id" value="Select presenter" />

                <select
                   v-model="form.presenter_id"
                   :error="form.errors.presenter_id"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Presenter">

                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.first_name + " " + user.last_name}}</option>
                </select>
            </div>

            <!-- Contributor Id -->

            <div class="col-span-6 sm:col-span-4">
            <InputLabel for="contributor_id" value="Select contributor" />

                <select
                   v-model="form.contributor_id"
                   :error="form.errors.contributor_id"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Contributor">

                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.first_name + " " + user.last_name}}</option>
                </select>
            </div>

            <!-- Purpose -->

                 <div class="col-span-6 sm:col-span-4">
                 <InputLabel for="purpose" value="Purpose" />
                    <select
                       v-model="form.purpose_id"
                       :error="form.errors.purpose_id"

                       class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Organization">

                            <option v-for="purpose in purposes" :key="purpose.id" :value="purpose.id">{{ purpose.name }}</option>
                    </select>
                </div>



            <!-- External Url -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="external_url" value="External Url" />
                <TextInput
                    id="external_url"
                    v-model="form.external_url"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="external_url"
                />
                <InputError :message="form.errors.external_url" class="mt-2" />
            </div>


            <!-- Minutes -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="minutes" value="Minutes" />
                <TextInput
                    id="minutes"
                    v-model="form.minutes"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="minutes"
                />
                <InputError :message="form.errors.minutes" class="mt-2" />


            <!-- Primary -->


            <div class="block mt-4 mb-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.recurring" name="recurring" />
                    <span class="ml-2 text-sm text-gray-600">Recuring</span>
                </label>
            </div>









            <!-- Resolution Id-->




                <TextInput  id="resolution_id"  v-model="form.resolution_id"  type="hidden"  />

                <TextInput  id="resolution_id"  v-model="form.id"  type="hidden"  />

                <TextInput  id="agendable_type"  v-model="form.agendable_type"  type="hidden"  />

















        <file-pond
            name="test"
            ref="pond"
            class-name="my-pond"
            label-idle="Drop files here..."
            allow-multiple="true"
            allow-reorder="true"
            max-files = 10
            chunk-uploads = "true"
            v-bind:files="myFiles"
            v-on:init="handleFilePondInit"
            v-on:updatefiles= "updateFilePond"
            @processfile="onProcessFile"
            @addfile="onAddFile"
        />










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
