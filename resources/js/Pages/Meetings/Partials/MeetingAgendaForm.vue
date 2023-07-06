<script setup>
import { ref,computed, reactive, nextTick } from 'vue';
import { Link, useForm,router } from '@inertiajs/vue3';
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
import TextArea from "@/Components/TextArea.vue";
import DeleteButton from '@/Components/DeleteButton.vue';
import VoteButton from '@/Components/VoteButton.vue';
import EditButton from '@/Components/EditButton.vue';
import CancelButton from '@/Components/CancelButton.vue';
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
    meeting: Object,
    can: Object,
});


const showCreateForm = ref(false);
const showEditForm = ref(false);
const showMeetingParticipant = ref(false);
const editedAgendaId = ref(null)
const addVoteAgendaId = ref(null)
let agendaOnEditObject =reactive({});
let documentsForAgenda = reactive([]);

let agendaOnEdit = reactive({


});



const pond = reactive(['index.txt']);
let myFiles = reactive([])



const form = useForm({
    id: null,
    title: null ,
    presenter_id: null,
    contributor_id: null,
    purpose_id: null,
    external_url: null,
    recurring: false,
    minutes: null,
    photo: [],
    agendable_type: 'Meeting',
    meeting_id: props.meeting.id,
});

let formEdit = useForm({
    _method: 'PUT',
    id: agendaOnEditObject.id,
    title: agendaOnEditObject.title,
    presenter_id: agendaOnEditObject.presenter_id,
    contributor_id: agendaOnEditObject.contributor_id,
    purpose_id: agendaOnEdit.purpose_id,
    external_url: agendaOnEdit.title,
    recurring: agendaOnEdit.title,
    minutes: agendaOnEdit.title,
    photo: documentsForAgenda,
    agendable_type: 'Meeting',
    meeting_id: props.meeting.id,
});


const createMeetingAgenda = () => {
    form.post(route('agendas.store'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        // onSuccess: () => clearPhotoFileInput(),
    });
};

const updateMeetingAgenda = () => {
    _method: 'PUT',
    formEdit.post(route('agendas.update', formEdit.id), {


})
}

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

    // showCreateForm.value = false;

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

const deleteDocument = (id) => {
    console.log('delete this document ' + id)
    router.delete(route('documents.destroy', id), {
        preserveScroll: true,
        // onSuccess: () => closeModal(),
        // onError: () => passwordInput.value.focus(),
        // onFinish: () => form.reset(),
    });
};

const closeAgendaEditForm = () => {
    formEdit.reset()
    editedAgendaId.value = null
}

const closeVoteAddForm = () => {
    formVoteAdd.reset()
    addVoteAgendaId.value = null
}

const editAgenda = (id) => {
    if (id) {
    editedAgendaId.value = id
    nextTick(() => {
    //   const inputField1 = document.querySelector(`#title${id}`)
    //   const inputField2 = document.querySelector(`#body${id}`)

      const agendaOnEditObject = props.agendas.find(a => a.id == id)
      agendaOnEdit = JSON.stringify(agendaOnEditObject);
      console.log(agendaOnEditObject.title)


      showAgendaEditForm();



        formEdit.id = agendaOnEditObject.id
        formEdit.title = agendaOnEditObject.title
        formEdit.contributor_id = agendaOnEditObject.contributor_id
        formEdit.presenter_id = agendaOnEditObject.presenter_id
        formEdit.purpose_id = agendaOnEditObject.purpose_id
        formEdit.external_url = agendaOnEditObject.external_url
        formEdit.recurring = agendaOnEditObject.recurring
        formEdit.minutes = agendaOnEditObject.minutes


        for( const document of props.documents){

            if( document.agenda_id == agendaOnEditObject.id){
                documentsForAgenda.push(document.fullpath);
            }
        }

        // myFiles = JSON.stringify(documentsForAgenda);



        return documentsForAgenda;



        // return agendaOnEditObject;




    })
  } else {
    editedAgendaId.value = null
  }
}

  const formVoteAdd = useForm({
    meeting_id: props.meeting.id,
    agenda_id: null,
    subject: "",
  })


const addVote = (id) => {
    console.log(id)
    if (id) {
        addVoteAgendaId.value = id
    nextTick(() => {
        const agendaVoteObject = props.agendas.find(a => a.id == id)
        formVoteAdd.agenda_id = agendaVoteObject.id
    });
   }else{
    addVoteAgendaId.value = null
   }
}

const addAgendaVote = () => {
    formVoteAdd.post(route('votes.store'), {
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => formVoteAdd.reset(),

    });
    formVoteAdd.reset()
    addVoteAgendaId.value = null
}


const showAgenda = (id) => {
    formEdit.get(route('agendas.edit', id), {
        preserveScroll: true,
    });
};
</script>

<template>
    <ActionSection>

        <template #title>
            Agendas
        </template>

        <template #description>
            Manage Agendas
        </template>


        <template #content>
            <div class="flex space-x-2 justify-end">
                <CalendarButton v-if="can.organize_meeting" @click="deliveryStatus" >
                    Delivery Status
                </CalendarButton>
               <!-- <NotificationButton v-if="can.add_vote" @click="addVote" >
                    Add Vote
               </NotificationButton> -->

               <CalendarButton v-if="can.organize_meeting" @click="permissions" >
                    Permissions
                </CalendarButton>
               <NotificationButton v-if="can.organize_meeting" @click="agendaOptions" >
                    Options
               </NotificationButton>
         </div>

            <div class="text-sm text-gray-600 ">


                <SectionBorder />



                <ol class="flex flex-col  ">


                <li  v-for="(agenda, index) in agendas" :key="agenda.id"  class="mx-2 pl-2 text-lg font-medium p-2 border-b hover:bg-slate-100  focus-within:bg-gray-100">

                    <div v-if="editedAgendaId == agenda.id">


                <h1 class="mb-4 text-xl font-bold">Edit Agenda</h1>



                            <PartialFormSection @submitted="updateMeetingAgenda" >


                                 <template #form>

                                <input
                                    id="id"
                                    v-model="formEdit.id"
                                    type="hidden"

                                />

                                <!-- Title -->
                            <div class="col-span-6 mt-2 sm:col-span-4">
                                <InputLabel for="title" value="Title" />
                                <TextInput
                                    id="title"
                                    v-model="formEdit.title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="title"
                                />
                                <InputError :message="formEdit.errors.title" class="mt-2" />
                            </div>

                            <!-- Presenter Id -->

                            <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="presenter_id" value="Select presenter" />

                                <select
                                v-model="formEdit.presenter_id"
                                :error="formEdit.errors.presenter_id"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Presenter">

                                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.first_name + " " + user.last_name}}</option>
                                </select>
                            </div>

                            <!-- Contributor Id -->

                            <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="contributor_id" value="Select contributor" />

                                <select
                                v-model="formEdit.contributor_id"
                                :error="formEdit.errors.contributor_id"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Contributor">

                                        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.first_name + " " + user.last_name}}</option>
                                </select>
                            </div>

                            <!-- Purpose -->

                                <div class="col-span-6 sm:col-span-4">
                                <InputLabel for="purpose" value="Purpose" />
                                    <select
                                    v-model="formEdit.purpose_id"
                                    :error="formEdit.errors.purpose_id"

                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Organization">

                                            <option v-for="purpose in purposes" :key="purpose.id" :value="purpose.id">{{ purpose.name }}</option>
                                    </select>
                                </div>



                            <!-- External Url -->
                            <div class="col-span-6 sm:col-span-4">
                                <InputLabel for="external_url" value="External Url" />
                                <TextInput
                                    id="external_url"
                                    v-model="formEdit.external_url"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="external_url"
                                />
                                <InputError :message="formEdit.errors.external_url" class="mt-2" />
                            </div>


                            <!-- Minutes -->
                            <div class="col-span-6 sm:col-span-4">
                                <InputLabel for="minutes" value="Minutes" />
                                <TextInput
                                    id="minutes"
                                    v-model="formEdit.minutes"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="minutes"
                                />
                                <InputError :message="formEdit.errors.minutes" class="mt-2" />


                            <!-- Primary -->


                            <div class="block mt-4 mb-4">
                                <label class="flex items-center">
                                    <Checkbox v-model:checked="formEdit.recurring" name="recurring" />
                                    <span class="ml-2 text-sm text-gray-600">Recuring</span>
                                </label>
                            </div>

                            <!-- Meeting Id-->

                            <TextInput  id="meeting_id"  v-model="formEdit.meeting_id"  type="hidden"  />
                            <TextInput  id="agendable_type" v-model="formEdit.agendable_type" type="hidden"  />

                            <ol  class="align-top my-2">
                    <li v-for="document in documents" :key="document.id" class="mx-2 px-2 ">
                        <!-- <NavLink v-if="document.agenda_id == agenda.id" class="flex items-center px-2 py-1  focus:text-indigo-500 align-top " :href="`/documents/${document.id}`"> -->
                            <!-- route('named.route', ['category' => $category->id, 'item' => $item->id]); -->


                        <div v-if="document.agenda_id == agenda.id" class="flex flex-row">
                        <NavLink  class="flex items-center px-2 py-1  text-sm  focus:text-indigo-500" :href="`/documents/${document.id}`">
                                        <img :src="`http://localhost:8000/storage/icons/${document.extension}.png`" class="image-fluid w-4 mr-2">
                                            {{ document.name }}
                                            <icon v-if="document.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                        </NavLink>

                        <NavLink v-if="can.organize_meeting || can.contribute_meeting" @click="deleteDocument(`${document.id}`)" class="text-red-700 rounded-md cursor-pointer">x</NavLink>

                    </div>
                    </li>

                    </ol>



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

                            <CancelButton @click="closeAgendaEditForm">
                                    Cancel
                            </CancelButton>
                            <ActionMessage :on="formEdit.recentlySuccessful" class="mr-3">
                                Saved.
                            </ActionMessage>



                            <PrimaryButton :class="{ 'opacity-25': formEdit.processing }" :disabled="formEdit.processing">
                                Save
                            </PrimaryButton>




                            </template>


                            </PartialFormSection>

                </div>


                   <div v-else>
                    {{ index + 1 }} . {{ agenda.title }}

                    <span>
                        <vote-button v-if="can.organize_meeting || can.contribute_meeting" @submit="addVote(`${agenda.id}`)" class="text-lg">Add Vote</vote-button>
                        <edit-button v-if="can.organize_meeting || can.contribute_meeting" @submit="editAgenda(`${agenda.id}`)">Edit</edit-button>

                        <delete-button v-if="can.organize_meeting || can.contribute_meeting" @delete="deleteAgenda(`${agenda.id}`)">Delete</delete-button>
                    </span>



                    <div class="flex flex-row space-x-2 text-gray-500 text-xs font-thin">
                            <div>{{ agenda.pfirst_name + ' ' +  agenda.plast_name }}</div>
                            <div> for {{ agenda.purpose_name }}</div>
                            <div> - {{ agenda.minutes }} Minutes</div>

                    </div>


                    <ol  class="align-top mt-2">
                    <li v-for="document in documents" :key="document.id" class="mx-2 px-2 ">
                        <!-- <NavLink v-if="document.agenda_id == agenda.id" class="flex items-center px-2 py-1  focus:text-indigo-500 align-top " :href="`/documents/${document.id}`"> -->
                            <!-- route('named.route', ['category' => $category->id, 'item' => $item->id]); -->



                        <NavLink v-if="document.agenda_id == agenda.id" class="flex items-center px-2 py-1  text-sm  focus:text-indigo-500" :href="`/documents/${document.id}`">
                                        <img :src="`http://localhost:8000/storage/icons/${document.extension}.png`" class="image-fluid w-4 mr-2">
                                            {{ document.name }}
                                            <icon v-if="document.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
                        </NavLink>
                    </li>

                    </ol>

            </div>



            <div v-if="addVoteAgendaId == agenda.id">

                <SectionBorder />
                <h1 class="mb-4 text-xl font-bold">Add Vote</h1>

                <PartialFormSection @submitted="addAgendaVote" >

                    <template #form>






                    <input
                        id="id"
                        v-model="formVoteAdd.agenda_id"
                        type="hidden"

                    />

                    <input
                        id="id"
                        v-model="formVoteAdd.meeting_id"
                        type="hidden"

                    />



                    <!-- Title -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="subject" value="Subject" />
                        <TextArea
                            id="subject"
                            v-model="formVoteAdd.subject"
                            type="textarea"
                            class="mt-1 block w-full"
                            autocomplete="subject"
                        />
                        <InputError :message="form.errors.subject" class="mt-2" />
                    </div>





                </template>

                <template #actions>

                <CancelButton @click="closeVoteAddForm">
                        Cancel
                </CancelButton>
                <ActionMessage :on="formEdit.recentlySuccessful" class="mr-3">
                    Saved.
                </ActionMessage>



                <PrimaryButton :class="{ 'opacity-25': formEdit.processing }" :disabled="formEdit.processing">
                    Save
                </PrimaryButton>




                </template>


                </PartialFormSection>

                </div>






              </li>



             </ol>

            </div>

            <button v-if="can.organize_meeting || can.contribute_meeting" class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showAgendaCreateForm">
                <p v-show="!showCreateForm">Add Agenda</p>
                <p v-show="showCreateForm">Close Agenda Form</p>
            </button>

            <SectionBorder />





            <div v-show="showCreateForm">

            <PartialFormSection @submitted="createMeetingAgenda" >


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
                    required
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









            <!-- Meeting Id-->




                <TextInput  id="meeting_id"  v-model="form.meeting_id"  type="hidden"  />

                <TextInput  id="agendable_type" v-model="form.agendable_type" type="hidden"  />

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
