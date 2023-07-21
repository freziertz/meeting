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
import DangerButton from "@/Components/DangerButton.vue";
import DialogModal from "@/Components/DialogModal.vue";

const props = defineProps({
  announcement: Object,
});

const form = useForm({
  _method: "PUT",
  title: props.announcement.title,
  content: props.announcement.content,
  start_date: props.announcement.start_date,
  end_date: props.announcement.end_date,
  start_time: props.announcement.start_time,
  end_time: props.announcement.end_time,
});

const updateAnnouncement = () => {
  form.post(route("announcements.update", props.announcement.id), {
    onFinish: () => form.reset(),
  });
};

const deleteAnnouncement = () => {
  form.delete(route("announcements.destroy", props.announcement.id), {
    preserveScroll: true,
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
                <FormSection @submitted="updateAnnouncement">
                    <template #title>
                        Announcement Information
                    </template>

                    <template #description>
                        Edit announcement.
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


                    <div class="col-span-4 sm:col-span-2 ml-2">

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
                    <div class="col-span-5 sm:col-span-3">

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


                    <DangerButton
                        class="mx-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteAnnouncement"
                    >
                        Delete Announcement
                    </DangerButton>




                        <!-- <Link class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition" :href="`/announcements/${announcement.id}`" >
                            <span>Delete</span>
                            <span class="hidden md:inline">&nbsp;Announcement</span>
                        </Link> -->

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
