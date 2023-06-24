<script setup>
import { ref,computed, onBeforeMount } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';

import moment from "moment";
import ActionMessage from '@/Components/ActionMessage.vue';
import ActionSection from '@/Components/ActionSection.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    document: Object,
});

let showPdf = ref(false);
let showImage = ref(false);
let showVideo = ref(false);
let showAudio = ref(false);
let showOffice = ref(false);
let showGoogle = ref(false);
let showUnkown = ref(false);
let type = ref('');

onBeforeMount(() => {
  type = props.document.mime_type
  if( type.includes("pdf")){
    showPdf = true;
  }else if( type.includes("image")){
    showImage = true;
  }else if( type.includes("video")){
    showVideo = true;
    }else if( type.includes("audio")){
    showAudio = true;
    }else if( type.includes("opendocument")){
    showGoogle = true;
  }  else if((type.includes("officedocument"))|| (type.includes("msword")) || (type.includes("msexcel"))) {
    showOffice = true;
  }else{
    showUnkown = true;
  }
})





</script>

<template>
   <div>



            <div v-show="showPdf" class=" w-full text-sm text-gray-600">

                <object :data="`${document.fullpath}`" type="application/pdf" class="w-full h-screen" >
                    <p>Unable to display PDF file. <a :href="`${document.fullpath}`">Download</a> instead.</p>
                </object>

            </div>

            <div v-show="showImage" class=" w-full text-sm text-gray-600">

                <img :src="`${document.fullpath}`" :alt="'${document.name}'" >

            </div>


            <div v-show="showVideo" class=" w-full text-sm text-gray-600">

                <video autoplay auto controls class="w-full">
                    <source :src="`${document.fullpath}`" :type="`${document.mime_type}`">



                    Download the
                    <a :href="`${document.fullpath}`">{{ document.extension }}</a>

                </video>

            </div>


            <div v-show="showAudio" class=" w-full text-sm text-gray-600">


            <figure>
                <figcaption>Listen {{ document.name }}</figcaption>
                <audio
                    autoplay loop controls
                    :src="`${document.fullpath}`" :type="`${document.mime_type}`">
                    Download the
                    <a :href="`${document.fullpath}`"> {{ document.extension }}</a>
                </audio>
            </figure>

            </div>


            <div v-show="showOffice" class=" w-full text-sm text-gray-600">

                <VueDocPreview :value="`${document.fullpath}`" type="office" />
                <iframe
                :src="`https://view.office.live.com/op/embed.aspx?src=${document.fullpath}`"
                class="w-full"
                frameborder="0">
                </iframe>
            </div>


            <div v-show="showGoogle" class=" w-full text-sm text-gray-600">

                <iframe
                :src="`https://drive.google.com/viewer?embedded=true&hl=en-US&url=${document.fullpath}`"
                class="w-full"
                frameborder="0">
                </iframe>

            </div>



            <div v-show="showUnkown" class=" w-full text-sm text-gray-600">

                <object :data="`${document.fullpath}`" type="application/pdf" class="w-full h-screen" >
                    <p>Unable to display PDF file. <a :href="`${document.fullpath}`">Download</a> instead.</p>
                </object>

            </div>











  </div>
</template>
