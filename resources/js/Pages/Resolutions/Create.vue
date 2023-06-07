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


const addField = (value, fieldType) => {
        fieldType.push({ })
};

const removeField = (index, fieldType) => {
      fieldType.splice(index, 1)
}

const form = useForm({
    subject: null,
    notes_to_voters: null,
    voting_deadline: null,
    reminders: [{
        reminder: 1,
    }],
});

const createResolution = () => {
  form.post(route("resolutions.store"), {
    onFinish: () => form.reset(),
  });
};
</script>

<template>
    <AppLayout title="Resolutions">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Resolutions
            </h2>
        </template>

        <div>

       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                <FormSection @submitted="createResolution">
                    <template #title>
                        Resolution Information
                    </template>

                    <template #description>
                        Create new resolution.
                    </template>

                    <template #form>


                        <!-- Resolution Subject -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="subject" value="Subject" />
                            <TextArea
                                id="subject"
                                v-model="form.subject"
                                type="textarea"
                                class="mt-1 block w-full"
                                autocomplete="subject"
                            />
                            <InputError :message="form.errors.subject" class="mt-2" />
                        </div>

                        <!-- Notes to Notes to Voters -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="notes_to_voters" value="Notes to Voters" />
                            <TextArea
                                id="notes_to_voters"
                                v-model="form.notes_to_voters"
                                type="textarea"
                                class="mt-1 block w-full"
                                autocomplete="notes_to_voters"
                            />
                            <InputError :message="form.errors.notes_to_voters" class="mt-2" />
                        </div>


                        <!-- Voting Deadline -->
                        <div class="col-span-6 sm:col-span-4">

                            <InputLabel for="voting_deadline" value="Voting Deadline" />
                            <TextInput
                                id="voting_deadline"
                                v-model="form.voting_deadline"
                                type="date"
                                class="mt-1 block w-full"
                                autocomplete="voting_deadline"
                            />

                            <InputError :message="form.errors.voting_deadline" class="mt-2" />

                        </div>

                         <!-- Reminder -->


                     <div v-for="( input , index) in form.reminders" :key="`Reminder-${index}`" class="col-span-6 sm:col-span-4 flex" >

                        <!-- Resolution Reminder -->
                        <div class="col-span-6 sm:col-span-4">

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
