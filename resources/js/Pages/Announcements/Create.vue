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

defineProps({
    can: Object,
});

const form = useForm({
  title: "",
  content: "",
  start_date:"",
  end_date:"",
  start_time:"",
  end_time:""
});

const createAnnouncement = () => {
  form.post(route("announcements.store"), {
    onFinish: () => form.reset(),
  });
};
</script>
<template>
    <AppLayout title="Announcements">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Announcements
            </h2>
        </template>

        <div>
       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <div>
                <FormSection @submitted="createAnnouncement">
                    <template #title>
                        Announcement Information
                    </template>

                    <template #description>
                        Create new announcement.
                    </template>

                    <template #form>

                        <!-- Announcement Title -->
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

                    <!-- Announcement Content -->

                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="content" value="Content" />
                        <TextInput
                            id="content"
                            v-model="form.content"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="content"
                        />
                        <InputError :message="form.errors.content" class="mt-2" />
                    </div>



                    <!-- Start Date -->

                    <div class="col-span-4 sm:col-span-3">

                        <InputLabel for="start_date" value="Start Date"/>
                        <TextInput
                            id="start_date"
                            v-model="form.start_date"
                            type="date"
                            class="mt-1 block w-full"
                            autocomplete="start_date"
                            required
                        />

                        <InputError :message="form.errors.start_date" class="mt-2" />

                    </div>

                        <!-- Start Time -->


                    <div class="col-span-2 sm:col-span-2 ml-2">

                        <InputLabel for="start_time" value="Start time" />
                        <TextInput
                            id="start_time"
                            v-model="form.start_time"
                            type="time"
                            class="mt-1  block w-full"
                            autocomplete="start_time"
                            required
                        />
                        <InputError :message="form.errors.start_time" class="mt-2" />
                    </div>





                        <!-- End Date -->
                    <div class="col-span-4 sm:col-span-3">

                    <InputLabel for="end_date" value="End Date"/>
                    <TextInput
                        id="end_date"
                        v-model="form.end_date"
                        type="date"
                        class="mt-1 block w-full"
                        autocomplete="end_date"
                        required
                    />

                    <InputError :message="form.errors.end_date" class="mt-2" />

                    </div>

                    <!-- End Time -->


                    <div class="col-span-2 sm:col-span-2 ml-2">

                    <InputLabel for="end_time" value="End Time" />
                    <TextInput
                        id="end_time"
                        v-model="form.end_time"
                        type="time"
                        class="mt-1  block w-full"
                        autocomplete="end_time"
                        required
                    />
                    <InputError :message="form.errors.end_time" class="mt-2" />
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
