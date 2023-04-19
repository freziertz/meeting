<script setup>
import { ref,computed } from 'vue';
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
    meeting: Object,

});

const confirmingLogout = ref(false);
const showForm = ref(false);
const showMeetingParticipant = ref(false);



const pond = ref(['index.html']);



const form = useForm({   
    title: 'title test' ,
    presenter_id: 1,
    contributor_id: 1,
    minutes: 12,
    purpose_id: 1,
    external_url: 'http://www.goolge.com',
    recurring: false,
    minutes: 15,
    photo: [],
    meeting_id: props.meeting.meeting_id,
});


const createMeetingAgenda = () => {
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


const showAgendaForm = () => { 
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
       

        <template #content>

            <div class="text-sm text-gray-600 ">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                    <tr class="text-left font-bold">
                                       
                                        <th class="pb-4 pt-6 px-6">Presenter</th>
                                        <th class="pb-4 pt-6 px-6">Contributor</th>
                                        <th class="pb-4 pt-6 px-6">Purpose</th>
                                        <th class="pb-4 pt-6 px-6">External url</th>
                                        <th class="pb-4 pt-6 px-6">Minutes</th>
                                        <th class="pb-4 pt-6 px-6">Recuring?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="agenda in agendas" :key="agenda.id" class="hover:bg-gray-100 focus-within:bg-gray-100">


        

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/agendas/${agenda.id}`">
                                            {{ agenda.pfirst_name  }} {{ agenda.plast_name }}
                                        
                                        </Link>
                                    </td>


                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/agendas/${agenda.id}`">
                                            {{ agenda.first_name }} {{ agenda.last_name }}
                                        
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/agendas/${agenda.id}`">
                                            {{ agenda.purpose_name }}
                                        
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/agendas/${agenda.id}`">
                                            {{ agenda.external_url }}
                                        
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/agendas/${agenda.id}`">
                                            {{ agenda.minutes }}
                                        
                                        </Link>
                                    </td>

                                    <td class="border-t">
                                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/agendas/${agenda.id}`">
                                            {{ agenda.recurring? 'Yes': 'No' }}
                                        
                                        </Link>
                                    </td>

                                </tr>
                                </tbody>
                    </table>
            </div>

            <button class="flex items-center px-6 py-4 focus:text-indigo-500" v-on:click="showAgendaForm">
                <p v-show="!showForm">Add Agenda</p> 
                <p v-show="showForm">Close Agenda Form</p>           
            </button>

            <SectionBorder />

        

        

            <div v-show="showForm">

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
                <InputLabel for="purpose_id" value="Purpose" />
                <TextInput
                    id="purpose_id"
                    v-model="form.purpose_id"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="purpose_id"
                />
                <InputError :message="form.errors.purpose_id" class="mt-2" />
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
