<script setup>
import { ref, reactive } from "vue";
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
import TextArea from "@/Components/TextArea.vue";

// defineProps({});

const props = defineProps({
  meeting_types: Array,
  purpose: Array,
});

const events = reactive([{
    meeting_date:'',
    meeting_start_time:'',
    meeting_end_time:''
}]);

const addField = (value, fieldType) => {
        fieldType.push({ })
};

const removeField = (index, fieldType) => {
      fieldType.splice(index, 1)

}


const form = useForm({
  meeting_type_id: 1,
  title: 'Annual Board meeting',
  events:[{
      meeting_date: '2023-09-22',
      meeting_start_time:'08:30',
      meeting_end_time:'12:30',
      }],
  venue: 'Datahouse HQ',
  google_map_url: 'http://google.com',
  timezone_id: 1,
  description:'Annual Board meeting for meeting management development',
  participants_notes: 'Meeting Management system develepment resolution and fund requirement ',
  organizer_notes: 'Prepare agenda for meeting management system development and propose source of fund',
  organizer_title: 'Administrator',
  reminders: [{
    reminder: 2,
  }],
  status: 1
});

const createMeeting = () => {
  form.post(route("meetings.store"), {
    // onFinish: () => form.reset(),
  });
};
</script>

<template>
    <AppLayout title="Meetings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Meetings
            </h2>
        </template>

        <div>

       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                <FormSection @submitted="createMeeting">
                    <template #title>
                        Meeting Information
                    </template>

                    <template #description>
                        Create new meeting.
                    </template>

                    <template #form>


                         <!-- Meeting Type -->


                         <div class="col-span-6 sm:col-span-4">
                         <InputLabel for="Meeting type" value="Meeting type" />
                            <select
                               v-model="form.meeting_type_id"
                               :error="form.errors.meeting_type_id"
                               required
                               class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" label="Organization">

                                    <option v-for="meeting_type in meeting_types" :key="meeting_type.id" :value="meeting_type.id">{{ meeting_type.name }}</option>
                            </select>
                        </div>






                        <!-- Meeting Title -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="title" value="Meeting title" />
                            <TextInput
                                id="title"
                                v-model="form.title"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="title"
                                required
                            />
                            <InputError :message="form.errors.title" class="mb-2" />
                        </div>


                        <!-- Event or Schedule -->

                     <div v-for="( input , index) in form.events" :key="`Event-${index}`" class="col-span-6 sm:col-span-4 flex" >




                        <!-- Meeting Date -->
                        <div class="col-span-4 sm:col-span-2">

                            <InputLabel for="meeting_date" :value="`Meeting date for day ${index + 1}`" />
                            <TextInput
                                id="input.meeting_date"
                                v-model="input.meeting_date"
                                type="date"
                                class="mt-1 block w-full"
                                autocomplete="inputmeeting_date"
                                required
                            />

                          <InputError :message="form.errors.meeting_date" class="mt-2" />

                          </div>


                        <!-- Meeting Start Time -->


                        <div class="col-span-2 sm:col-span-1 ml-2">

                            <InputLabel for="meeting_start_time" value="Start time" />
                            <TextInput
                                id="meeting_start_time"
                                v-model="input.meeting_start_time"
                                type="time"
                                class="mt-1  block w-full"
                                autocomplete="meeting_start_time"
                                required
                            />
                            <InputError :message="form.errors.meeting_start_time" class="mt-2" />
                        </div>

                        <!-- Meeting End Time -->


                        <div class="col-span-2 sm:col-span-1 ml-2">

                            <InputLabel for="meeting_end_time" value="End time" />
                            <TextInput
                                id="meeting_end_time"
                                v-model="input.meeting_end_time"
                                type="time"
                                class="mt-1 block w-full"
                                autocomplete="meeting_end_time"
                                required
                            />
                            <InputError :message="form.errors.meeting_end_time" class="mt-2" />
                        </div>

                        <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                        <button type="button" @click="addField(input, form.events)"  class="text-xl">+</button>

                        </div>

                        <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                        <button v-show="form.events.length > 1" type="button" @click ="removeField(index, form.events)" class="text-xl">-</button>

                        </div>





                        </div>





                        <!-- Meeting Venue -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="venue" value="Venue" />
                            <TextInput
                                id="venue"
                                v-model="form.venue"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="venue"
                                required
                            />
                            <InputError :message="form.errors.venue" class="mt-2" />
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="organizer_title" value="Organizer title" />
                            <TextInput
                                id="organizer_title"
                                v-model="form.organizer_title"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="organizer_title"
                                required
                            />
                            <InputError :message="form.errors.organizer_title" class="mt-2" />
                        </div>


                        <!-- Google Map Url -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="venue" />
                            <TextInput
                                id="google_map_url"
                                v-model="form.google_map_url"
                                type="url"
                                class="mt-1 block w-full"
                                autocomplete="google_map_url"
                                placeholder="Enter Google map URL here"
                            />
                            <InputError :message="form.errors.google_map_url" class="mt-2" />
                        </div>

                        <!-- Meeting Description -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="description" value="Description" />
                            <TextArea
                                id="description"
                                v-model="form.description"
                                type="textarea"
                                class="mt-1 block w-full"
                                autocomplete="description"
                            />
                            <InputError :message="form.errors.description" class="mt-2" />
                        </div>

                        <!-- Notes for Participants -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="participants_notes" value="Notes for Participants" />
                            <TextArea
                                id="participants_notes"
                                v-model="form.participants_notes"
                                type="textarea"
                                class="mt-1 block w-full"
                                autocomplete="participants_notes"
                            />
                            <InputError :message="form.errors.participants_notes" class="mt-2" />
                        </div>

                        <!-- Notes for Organizer -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="organizer_notes" value="Notes for Organizer" />
                            <TextArea
                                id="organizer_notes"
                                v-model="form.organizer_notes"
                                type="textarea"
                                class="mt-1 block w-full"
                                autocomplete="organizer_notes"
                            />
                            <InputError :message="form.errors.organizer_notes" class="mt-2" />
                        </div>

                        <input type="range" name="age" min="18" max="60" value="18"
                            oninput="this.nextElementSibling.value = this.value">
                            <output>18</output>



                         <!-- Reminder -->


                     <div v-for="( input , index) in form.reminders" :key="`Reminder-${index}`" class="col-span-6 sm:col-span-4 flex" >




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
                                required
                            />

                          <InputError :message="form.errors.reminder" class="mt-2" />

                          </div>




                        <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                        <button type="button" @click="addField(input, form.reminders)"  class="text-xl">+</button>

                        </div>

                        <div class="col-span-1 sm:col-span-1 ml-2 mt-8">
                        <button v-show="form.reminders.length > 1" type="button" @click ="removeField(index, form.reminders)" class="text-xl">-</button>

                        </div>





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
