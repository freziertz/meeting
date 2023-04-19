<script setup>
import { ref } from "vue";
import moment from "moment";
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
import DangerButton from "@/Components/DangerButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import PSPDFKitContainer from "@/Components/PSPDFKitContainer.vue";
import DocumentInfoForm from '@/Pages/Documents/Partials/DocumentInfoForm.vue';


const props = defineProps({
  document: Object,
  pdfFile: String,
});

const pdfFile = props.pdfFiles || ref(["/document.pdf"]) ;

const form = useForm({
  _method: "PUT",
  name: props.document.name,
  description: props.document.description,
});

const handleLoaded = (instance) => {
    console.log("PSPDFKit has loaded: ", instance);
     this.pdfFile = window.URL.createObjectURL(instance.target.files[0]);
      // Do something.

};

const openDocument = (event) => {
    // To access the Vue.js instance data properties, use `this` keyword.
      if (this.pdfFile && this.pdfFile.startsWith('blob:')) {
        window.URL.revokeObjectURL(this.pdfFile);
      }
      this.pdfFile = window.URL.createObjectURL(event.target.files[0]);
}

const updateDocument = () => {
  form.post(route("documents.update", props.document.id), {
    onFinish: () => form.reset(),
  });
};



const deleteDocument = () => {
  form.delete(route("documents.destroy", props.document.id), {
    preserveScroll: true,
    onFinish: () => form.reset(),
  });
};
</script>


<template>
<AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profile
            </h2>
        </template>

        <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                 <DocumentInfoForm  :document = "document"  class="mt-10 sm:mt-0" />        




        </div>

        </div>

        
   

               
          
        
    </AppLayout>
</template>
