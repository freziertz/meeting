<script setup>
import { ref } from "vue";
// import { Inertia } from "@inertiajs/inertia";
import { Head, Link, useForm } from "@inertiajs/vue3";
// import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";


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


const pond = ref(['index.html']);


const form = useForm({   
    name: null,
    description: null,    
    documents: [],   
});


const createDocument = () => {
    form.post(route('documents.store'), {
        errorBag: 'createDocumentInformation',
        preserveScroll: true,
        // onSuccess: () => form.reset(),
        // onSuccess: () => clearDocumentFileInput(),
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
      // form.document.push(file.file);
      // console.log('Form document items is ', form.document)
};

const updateFilePond = (files) => {

    console.log('FilePond updated');  

    form.documents = files.map(files => files.file);

};


</script>
<template>
    <AppLayout title="Documents">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Documents
            </h2>
        </template>

        <div>
       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                <FormSection @submitted="createDocument">
                    <template #title>
                        Document Information
                    </template>

                    <template #description>
                        Create new meeting purpose.
                    </template>

                    <template #form>

                        <!-- Document Name -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="name" value="Name" />
                            <TextInput
                                id="name"
                                v-model="form.name"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="name"
                            />
                            <InputError :message="form.errors.name" class="mt-2" />
                        </div>

                    <!-- Document Description -->

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="description" value="Description" />
                        <TextInput
                            id="description"
                            v-model="form.description"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="description"
                        />
                        <InputError :message="form.errors.description" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">


                    <file-pond            
                        name="test"
                        ref="pond"
                        class-name="my-pond"
                        label-idle="Drop files here..."
                        allow-multiple="false"
                        allow-reorder="true"                          
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
                </FormSection>

                    <SectionBorder />
                </div>

            </div>
        </div>
    </AppLayout>
</template>
