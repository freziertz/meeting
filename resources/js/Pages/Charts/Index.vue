<script setup>
import { ref,  onMounted, onBeforeMount, reactive } from "vue";

// import { Inertia } from "@inertiajs/inertia";
import { Head,router, Link, useForm } from "@inertiajs/vue3";
// import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import ChatMessages from "@/Components/ChatMessages.vue";
import ChatForm from "@/Components/ChatForm.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    user: Object,
    messages : Array,
    echo: Object,
});

let messages = props.messages;





const form = useForm({
  message: "",
});




router.on('onMounted', (event) => {

    fetchMessages();


// window.Echo.private('private-chat')

Echo.private('private-meeting-chat')
        .listen('.meeting-chat', (e) => {
            console.log('this is the test');
            messages.push({
            message: e.message.message,
            user: e.user
            });
            // console.log(messages);
        });

})

onMounted(() => {

    Pusher.log = function(msg) {
  console.log(msg);
};


    })


const fetchMessages = () => {
    router.get("/messages")

};



const addMessage = (newMessage) => {
    // messages.push(newMessage);

    form.message = newMessage.message;
    form.post(route("send-message"), {


        preserveScroll: true,
    onFinish: () => form.reset(),

  });


};





//     form.post("send-message")



// };
</script>
<template>
    <AppLayout title="Purposes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Purposes
            </h2>
        </template>

        <div>
       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="container">
    <div class="card">
        <div class="card-header">Chats</div>
        <div class="card-body">
            <chat-messages :messages="messages"></chat-messages>
        </div>
        <div class="card-footer">
            <chat-form v-on:messagesent="addMessage" :user="user" ></chat-form>
        </div>
    </div>
</div>

            </div>
        </div>
    </AppLayout>
</template>
