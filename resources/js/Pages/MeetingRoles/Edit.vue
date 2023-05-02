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
  meeting_role: Object,
});

const form = useForm({
  _method: "PUT",
  name: props.meeting_role.name,
  description: props.meeting_role.description,
});

const updateMeetingRole = () => {
  form.post(route("meeting-roles.update", props.meeting_role.id), {
    onFinish: () => form.reset(),
  });
};

const deleteMeetingRole = () => {
  form.delete(route("meeting-roles.destroy", props.meeting_role.id), {
    preserveScroll: true,
    onFinish: () => form.reset(),
  });
};
</script>
<template>
    <AppLayout title="Meeting_roles">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Meeting Roles
            </h2>
        </template>

        <div>
       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                <FormSection @submitted="updateMeetingRole">
                    <template #title>
                        Meeting role Information
                    </template>

                    <template #description>
                        Edit meeting_role.
                    </template>

                    <template #form>

                        <!-- Meeting_role Name -->
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

                        <!-- Meeting_role Description -->
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

                    </template>






                    <template #actions>


                    <DangerButton
                        class="mx-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteMeetingRole"
                    >
                        Delete Meeting role
                    </DangerButton>




                        <!-- <Link class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition" :href="`/meeting_roles/${meeting_role.id}`" >
                            <span>Delete</span>
                            <span class="hidden md:inline">&nbsp;Meeting_role</span>
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
