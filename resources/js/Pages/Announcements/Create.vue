<script setup>
import { ref, reactive, computed, onMounted} from "vue";
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

// import MediumEditor from 'vuejs-medium-editor'

// import 'medium-editor/dist/css/medium-editor.css'
// import 'vuejs-medium-editor/dist/themes/default.css'
// // for the code highlighting
// import 'highlight.js/styles/github.css'

// defineProps({





// });

// // let content = ref("")

const count = ref(0)
console.log(count)
console.log(count.value)

const first_name = ref("John")
const last_name = ref('Doe')

const full_name = computed(() => {
    return first_name.value + ' ' + last_name.value
})





const options = reactive({
        disableEditing: false,
        uploadUrl: "https://api.imgur.com/3/image",
        uploadUrlHeader: {'Authorization': 'Client-ID a3tw6ve4wss3c'},
        file_input_name: "image",
        file_size: 1024 * 1024 * 10,
        imgur: true,

        placeholder:{
            text:"try"

        },

        toolbar: {
            allowMultiParagraphSelection: true,
            buttons:
            [

            'bold',
            'italic',
            'underline',
            'quote',

            'h2',
            'h3',
            'pre',
            'unorderedlist',
            'anchor',
                {
                name: 'pre',
                action: 'append-pre',
                aria: 'code highlight',
                tagNames: ['pre'],
                contentDefault: '<b><\\></b>',
                contentFA: '<i class="fa fa-code fa-lg"></i>',
                }
            ] ,


        },
});

const form = useForm({

  contentf: [],
});


const ida = ref(null)

onMounted(() => {
  ida.value.focus()
})

// const createAnnouncement = () => {
//   form.post(route("announcements.store"), {
//     // onFinish: () => form.reset(),
//   });
// };
// // const onChange = () => {
// //     console.log((content.value));
// // }

// // const processEditOperation = (operation) => {
// //       content.value = operation.event.srcElement.innerHTML
// //       console.log(content.value)
// //  }



//  const content = ref("A medium editor")

// //  const applyTextEdit = (content) => {
// //     content = content.value
// //     console.log(this.content)
// //  }

// const uploadCallback = (url) => {
//       console.log('uploaded url', url)
//     }
</script>
<template>
    <AppLayout title="Announcement">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Announcement
            </h2>
        </template>


       <div class="max-w-7xl mx-auto py-2 sm:px-6 lg:px-8">


        <input ref="ida" />





        {{ full_name }}


                <FormSection @submitted="createAnnouncement">
                    <template #title>
                        Account Information
                    </template>

                    <template #description>
                        Create new account.
                    </template>

                    <template #form>



                        <!-- <medium-editor
                            :content="content"
                            :options="options"

                            v-on:edit="applyTextEdit"
                            v-on:uploaded="uploadCallback"
                            custom-tag='div'

                        /> -->



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





    </AppLayout>
</template>
