<script setup>
import { ref, reactive, onMounted, nextTick } from 'vue';
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NotificationButton from '@/Components/NotificationButton.vue';
import ParticipantButton from '@/Components/ParticipantButton.vue';
import VoteButton from '@/Components/VoteButton.vue';
import ActionButton from '@/Components/ActionButton.vue';
import MinuteButton from '@/Components/MinuteButton.vue';
import ChatButton from '@/Components/ChatButton.vue';
import HandButton from '@/Components/HandButton.vue';
import NavLink from '@/Components/NavLink.vue';
import SectionBorder from "@/Components/SectionBorder.vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormMeetingSection from "@/Components/FormMeetingSection.vue";
import FormActionSection from "@/Components/FormActionSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import CancelButton from "@/Components/CancelButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import TabButton from '@/Components/TabButton.vue';
import TextArea from "@/Components/TextArea.vue";
import MinuteAgendaButton from "@/Components/MinuteAgendaButton.vue";

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faCheck } from '@fortawesome/free-solid-svg-icons'



/* add icons to the library */
library.add(faCheck)

// Start medium editor

// import MediumEditor from 'vuejs-medium-editor';
// import 'medium-editor/dist/css/medium-editor.css'
// import 'vuejs-medium-editor/dist/themes/default.css'
// // for the code highlighting
// import 'highlight.js/styles/github.css'

// import Editor from 'vuejs-medium-editor'

// End medium editor

const props = defineProps({
    title: String,
    actions:Array,
    user: Object,
    sessions: Array,
    agendas: Array,
    documents:Array,
    participants:Array,
    document: Object,
    meeting: Object,
    minute: Object,
    agenda: Object,
    statuses: Array,
    can: Object,
});



const showingNavigationDropdown = ref(false);

let leftSidebarShow = ref(true);

let rightSidebarShow = ref(false);

const meeting_id = props.meeting.id



// const document_id = props.document.id;

let showParticipant = ref(true);
let showAction = ref(false);
let showVote = ref(false);
let showMinutes = ref(false);
let showMinutesForm = reactive(false);
let showThisAgenda = reactive(true);
let showAgenda=reactive([]);
let show = reactive([]);
let showChat = ref(false);
let showHand = ref(false);
let showAgendaLink =ref(true)
let targetId = ref(null)
let formTitle = ref('')
let formBody = ref('')


const itemRefs = ref([])


const editedAgendaId = ref(null)



function toggleEdit(id) {
  if (id) {
    editedAgendaId.value = id
    nextTick(() => {
    //   const inputField1 = document.querySelector(`#title${id}`)
    //   const inputField2 = document.querySelector(`#body${id}`)

      const agenda = props.agendas.find(a => a.id === id)
    //   console.log(agenda)
      minuteForm.body = agenda.body
      minuteForm.title = agenda.title
      console.log(formTitle)

    //   const minute = props.minutes.find(m => m.agenda_id === id)
      // Aray filter

    //   if (!formTitle){
    //     formTitle.value = agenda.title
    //   }else{
    //     formTitle.value = minute.title
    //   }

    //   formBody = minute.body



    //   console.log(agenda);
    //   if (inputField1 && inputField2) {
    //     inputField1.value = agenda.title
    //     inputField2.focus()
    //   }
    })
  } else {
    editedAgendaId.value = null
  }
}


// const body = props.minute.body? props.minute.body: '';


const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};

const minuteForm = useForm({
    _method: "PUT",
    body: props.agenda.body || formBody.value,
    title: formTitle.value ,
//   body: formBody,
//   meeting_id: props.meeting.id,
//   document_id: props.document.id,
    agenda_id:  props.agenda.id
});

const createMinute = () => {
    minuteForm.post(route("agendas.update", props.agenda.id), {
    onFinish: () => minuteForm.reset(),
  });
  minuteForm.body = '';
};


const actionForm = useForm({
    agenda_id: null,
    name: 'test',
    actioners:[{
      actioner_id: null
,
      }],
    due_date: null,
    reminders: [{
       reminder: null,
    }],
    status_id: null,
    notes: '',
    as_of_date: null,
    meeting_id: props.meeting.id,
});

const createAction = () => {
  actionForm.post(route("actions.store"), {
    onFinish: () => form.reset(),
  });
};

const addField = (value, fieldType) => {
        fieldType.push({ })
};

const removeField = (index, fieldType) => {
      fieldType.splice(index, 1)

}










// const agendaTitle = computed(() => {


// });

// const select = (event, agenda) => {
//     // minuteForm.title[agenda.id] = agenda.title,
//     // minuteForm.body[agenda.id] = agenda.body,
//     targetId.value = event.currentTarget.id;
//     showAgenda[agenda.id] = !showAgenda[agenda.id]
//     // formTitle.value = agenda.title
//     console.log(event.currentTarget)

//     let formt= document.getElementById(title-targetId.value)
//     formt.value = agenda.title




//     show[agenda.id] = !show[agenda.id];

// //    return showMinutesForm
//     console.log(show[agenda.id]);

//     // console.log(showMinutesForm);
//     // console.log(agenda.id);
// }

const toggleParticipantShow = () => {
    showParticipant.value = !showParticipant.value;
    showAction.value = false;
    showChat.value = false;
    showMinutes.value = false;
    showVote.value = false;
    showHand.value = false;
}

const toggleActionShow = () => {
    showAction.value = !showAction.value;
    showParticipant.value = false;
    showChat.value = false;
    showMinutes.value = false;
    showVote.value = false;
    showHand.value = false;
}

const toggleVoteShow = () => {
    showVote.value = !showVote.value;
    showParticipant.value = false;
    showAction.value = false;
    showChat.value = false;
    showMinutes.value = false;
    showHand.value = false;
}

const toggleChatShow = () => {
    showChat.value = !showChat.value;
    showParticipant.value = false;
    showAction.value = false;
    showMinutes.value = false;
    showVote.value = false;
    showHand.value = false;
}

const toggleMinuteShow = () => {
    showMinutes.value = !showMinutes.value;
    showParticipant.value = false;
    showAction.value = false;
    showChat.value = false;
    showVote.value = false;
    showHand.value = false;
}

const toggleHandShow = () => {
    showHand.value = !showHand.value;
    showParticipant.value = false;
    showAction.value = false;
    showChat.value = false;
    showMinutes.value = false;
    showVote.value = false;
}

const toggleMinuteFormShow = () => {
    showMinutesForm.value = !showMinutesForm.value;
    // showAgendaLink.value = !showAgendaLink.value
    // showAction.value = false;
    // showChat.value = false;
    // showMinutes.value = false;
    // showVote.value = false;
    // showHand.value = false;
}

const toggleLeftSideBar = () => {
    leftSidebarShow.value = !leftSidebarShow.value
}


const toggleRightSideBar = () => {
    rightSidebarShow.value = !rightSidebarShow.value
}

// onMounted(() => {
//     Echo.private(`orders.${orderId}`)
//     .listen('OrderShipmentStatusUpdated', (e) => {
//         console.log(e.order);
//     });
// })

// onMounted(() => {
//   console.log(itemRefs.value.map(i => i))
// })



</script>

<template>
    <div>
    <Head :title="title" />


        <div class="flex flex-row space-x-2">
            <TabButton  @click="toggleLeftSideBar" >
                    left side
            </TabButton>

        </div>


    <div class="w-full flex flex-col sm:flex-row flex-wrap sm:flex-nowrap py-4 flex-grow  bg-white">


        <!-- <div v-show="!leftSidebarShow" class="flex flex-col w-3/12 border-x-2 border-t ">

          <div class="flex flex-col">

            <div>
            <TabButton  @click="toggleLeftSideBar" >
                    show
            </TabButton></div>

          </div>


        </div> -->



        <div v-show="leftSidebarShow" class="flex flex-col w-3/12 border-x-2 border-t h-screen overflow-y-auto">



            <div class="w-full text-3xl pl-6 font-extrabold bg-black text-white ">Meeting Agenda</div>

            <ol class="flex flex-col  p-2 border-b hover:bg-slate-100">
                <li  v-for="(agenda, index) in agendas" :key="agenda.id"  class="mx-2 pl-2 text-lg font-medium">
                    {{ index + 1 }} . {{ agenda.title }}



                    <div class="flex flex-row space-x-2 text-gray-500 text-xs font-thin">
                            <div>{{ agenda.pfirst_name + ' ' +  agenda.plast_name }}</div>
                            <div> for {{ agenda.purpose_name }}</div>
                            <div> - {{ agenda.minutes }} Minutes</div>

                    </div>


                    <ol  class="align-top mt-2">
                    <li v-for="document in documents" :key="document.id" class="mx-2 px-2 ">
                        <!-- <NavLink v-if="document.agenda_id == agenda.id" class="flex items-center px-2 py-1  focus:text-indigo-500 align-top " :href="`/documents/${document.id}`"> -->
                            <!-- route('named.route', ['category' => $category->id, 'item' => $item->id]); -->

                        <NavLink v-if="document.agenda_id == agenda.id" class="flex items-center px-2 py-1  text-sm  focus:text-indigo-500 align-top " :href="route('live-meeting', { meeting_id: meeting.id  , agenda_id: agenda.id, document_id : document.id} )" >
                                    <img :src="`/storage/icons/${document.extension}.png`" class="image-fluid w-4 mr-2">
                                    {{ document.name }}
                        </NavLink>
                    </li>
                </ol>





              </li>



            </ol>
        </div>

        <main class="w-6/12 h-screen">


            <slot />

        </main>

        <div class="w-3/12 flex flex-col mx-2 px-2 h-screen overflow-y-auto">
            <!-- participants -->

            <div >

                <ParticipantButton @click="toggleParticipantShow" >
                        Participants
                </ParticipantButton>

                <div v-show="showParticipant" class="mx-2 p-4 transition ease-in-out duration-150">
                    <ol>
                        <li v-for="(participant, index) in participants" :key="participant.id" >
                            {{ (index + 1) + '. ' + participant.first_name + ' ' + participant.last_name  }}
                            <span v-if="`${participant.status}` == 1"  class="px-2 text-green-700">
                                <font-awesome-icon icon="fa-solid fa-check" />
                            </span>
                        </li>
                    </ol>


                </div>
           </div>


            <!-- Minutes -->
           <div>

            <MinuteButton @click="toggleMinuteShow" >
                            Minutes
            </MinuteButton>



            <div v-show="showMinutes" class="mx-2 p-4">

                <ol>
                    <li  v-for="(agenda, index) in agendas" :key="agenda.id" ref="itemRefs">



                            <div v-if="editedAgendaId === agenda.id">

                                <FormMeetingSection  @submitted="createMinute" >

                                    <template #minuteForm>

                                    <!-- minutes body -->

                                    <div class="col-span-6 sm:col-span-4">
                                    <!-- <InputLabel for="title" value="Title" /> -->
                                        <TextInput
                                            :ref="`title${agenda.id}`"
                                            id="title"
                                            v-model="minuteForm.title"
                                            type="text"
                                            class="mt-1 block w-full"
                                            autocomplete="title"
                                            required
                                            readonly
                                        />
                                        <InputError :message="minuteForm.errors.title" class="mt-2" />
                                    </div>



                                    <!-- minutes body -->
                                    <div class="">
                                    <!-- <InputLabel for="body" value="Body" /> -->
                                    <TextArea
                                        :ref="`body${agenda.id}`"
                                        id="body"
                                        v-model="minuteForm.body"
                                        type="textarea"
                                        class="mt-1 block w-full"
                                        autocomplete="body"
                                    />
                                    <InputError :message="minuteForm.errors.body" class="mt-2" />
                                    </div>



                                    </template>

                                    <template #actions>
                                    <div class="flex flex-row space-x-2">
                                    <ActionMessage :on="minuteForm.recentlySuccessful" class="mr-3">
                                    Saved.
                                    </ActionMessage>

                                    <CancelButton @click="closeMinuteForm">
                                    Cancel
                                    </CancelButton>

                                    <PrimaryButton :class="{ 'opacity-25': minuteForm.processing }" :disabled="minuteForm.processing">
                                    Save
                                    </PrimaryButton>

                                </div>
                                    </template>
                                    </FormMeetingSection>

                            </div>

                            <div v-else>

                                <!-- <span  @click="select($event, agenda)" :id="`${agenda.id }`"> -->
                                <span @click.prevent="toggleEdit(agenda.id)">
                                    <!-- <span v-show="showThisAgenda ==! showAgenda[agenda.id]"> -->
                                        {{ index + 1 }} . {{ agenda.title }} presented by {{ agenda.pfirst_name + ' ' +  agenda.plast_name }}
                                    <!-- </span> -->
                                </span>

                            </div>










                    </li>
                </ol>












            </div>
           </div>

           <div>

                <!-- Vote -->

            <div>

                <VoteButton @click="toggleVoteShow" >
                            Votes
                </VoteButton>

                <div v-show="showVote" class="mx-2 p-4 transition ease-in-out duration-150">

                    vote


                </div>


            </div>

                <!-- Action -->

            <div>

                <ActionButton @click="toggleActionShow" >
                            Actions
                </ActionButton>
                <div v-show="showAction" class="mx-2 p-4">

                    <SectionBorder />

                    <div class=" w-full text-sm text-gray-600">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                    <tr class="text-left font-bold">
                                        <th class="pb-4 pt-6 px-6">Action</th>
                                        <th class="pb-4 pt-6 px-6">Responsible</th>
                                        <th class="pb-4 pt-6 px-6">Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="action in actions" :key="action.id" class="hover:bg-gray-100 focus-within:bg-gray-100">


                                    <td class="border-t">
                                        <NavLink class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/actions/${action.id}`">
                                            {{ action.name }}

                                        </NavLink>
                                    </td>

                                    <td class="border-t">
                                        <NavLink class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/actions/${action.id}`">
                                            {{ action.first_name }} {{ action.last_name }}

                                        </NavLink>
                                    </td>


                                    <td class="border-t">
                                        <NavLink class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/actions/${action.id}`">
                                            {{ action.due_date }}

                                        </NavLink>
                                    </td>







                                    <td class="border-t">

                                    <delete-button v-if="can.organize_meeting" @delete="deleteAction(`${action.id}`)">Delete</delete-button>

                                    </td>

                                </tr>
                                </tbody>
                    </table>
            </div>



            <SectionBorder />

            <div class="text-2xl mb-2"> New Action</div>

                    <FormActionSection @submitted="createAction">

                    <template #actionForm>

                        <!-- User Id -->

                        <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="agenda_id" value="Select agenda" />

                            <select
                            v-model="actionForm.agenda_id"
                            :error="actionForm.errors.agenda_id"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="User"
                            required
                            >

                                    <option v-for="agenda in agendas" :key="agenda.id" :value="agenda.id">{{ agenda.title}}</option>
                            </select>


                        </div>

                        <!-- Action -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="name" value="Action"/>
                            <TextArea
                                id="name"
                                v-model="actionForm.name"
                                type="textarea"
                                class="mt-1 block w-full"
                                autocomplete="name"
                                required
                            />
                            <InputError :message="actionForm.errors.name" class="mt-2" />
                        </div>






                        <!-- Responsible Person -->



                        <div v-for="( input , index) in actionForm.actioners" :key="`Actioner-${index}`" class="col-span-6 sm:col-span-4 flex" >

                                <!-- Actioner - responsible person -->

                                <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="actioner_id" :value="`Assined to ${index + 1}`" />
                            <select
                            id = "actioner_id"
                            v-model="input.actioner_id"
                            :error="actionForm.errors.actioner_id"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="User"
                            required
                            >

                                    <option v-for="user in participants" :key="user.id" :value="user.id">{{ user.first_name }} {{ user.last_name }}</option>
                            </select>

                        </div>





                                <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                                    <button type="button" @click="addField(input, actionForm.actioners)"  class="text-xl">+</button>
                                </div>

                                <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                                    <button v-show="actionForm.actioners.length > 1" type="button" @click ="removeField(index, actionForm.actioners)" class="text-xl">-</button>
                                </div>


                        </div>


                        <!-- Due Date -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="due_date" value="Due Date" />
                            <TextInput
                                id="due_date"
                                v-model="actionForm.due_date"
                                type="date"
                                class="mt-1 block w-full"
                                autocomplete="due_date"
                                required
                            />
                            <InputError :message="actionForm.errors.due_date" class="mt-2" />
                        </div>

                        <div v-for="( input , index) in actionForm.reminders" :key="`Reminder-${index}`" class="col-span-6 sm:col-span-4 flex" >




                            <!-- Meeting Reminder -->
                            <div class="col-span-4 sm:col-span-2">

                                <InputLabel for="reminder" :value="`Remainder in days`" />
                                <TextInput
                                    id="reminder"
                                    v-model="input.reminder"
                                    type="number"
                                    min="1"
                                    class="mt-1 block w-full"
                                    autocomplete="reminder"

                                />

                            <InputError :message="actionForm.errors.reminder" class="mt-2" />

                            </div>




                            <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                            <button type="button" @click="addField(input, actionForm.reminders)"  class="text-xl">+</button>

                            </div>

                            <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                            <button v-show="actionForm.reminders.length > 1" type="button" @click ="removeField(index, actionForm.reminders)" class="text-xl">-</button>

                            </div>

                        </div>



                        <!-- Status_id -->

                        <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="status_id" value="Status" />

                            <select
                            v-model="actionForm.status_id"
                            :error="actionForm.errors.status_id"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="User">

                                    <option v-for="status in statuses" :key="status.id" :value="status.id">{{ status.name }}</option>
                            </select>


                        </div>





                        <!-- As of -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="as_of_date" value="As of" />
                            <TextInput
                                id="as_of_date"
                                v-model="actionForm.as_of_date"
                                type="date"
                                class="mt-1 block w-full"
                                autocomplete="as_of_date"

                            />
                            <InputError :message="actionForm.errors.as_of_date" class="mt-2" />
                        </div>



                        <!-- Action -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="notes" value="Progress/ Note"/>
                            <TextArea
                                id="notes"
                                v-model="actionForm.notes"
                                type="textarea"
                                class="mt-1 block w-full"
                                autocomplete="notes"
                            />
                            <InputError :message="actionForm.errors.notes" class="mt-2" />
                        </div>

                        <!-- Meeting Id-->

                            <TextInput
                                id="meeting_id"
                                v-model="actionForm.meeting_id"
                                type="hidden"
                                />

                            <TextInput
                            id="meeting_id"
                            v-model="actionForm.meeting_id"
                            type="hidden"
                                />
                    </template>

                    <template #actions>
                        <ActionMessage :on="actionForm.recentlySuccessful" class="mr-3">
                            Saved.
                        </ActionMessage>

                        <PrimaryButton :class="{ 'opacity-25': actionForm.processing }" :disabled="actionForm.processing">
                            Save
                        </PrimaryButton>
                    </template>
                </FormActionSection>

                </div>


            </div>


             <!-- chat -->


            <ChatButton @click="toggleChatShow">
                         Chat
            </ChatButton>


            <div v-show="showChat" class="mx-2 p-4">
            Chat

            </div>

           </div>

            <!-- hands -->

           <div>

            <HandButton @click="toggleHandShow"  >
                            Hands
            </HandButton>

            <div v-show="showHand" class="mx-2 p-4">
              Hands

            </div>
           </div>







        </div>

    </div>


</div>
</template>


