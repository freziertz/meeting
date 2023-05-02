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

const props = defineProps({
  group: Object,
});

const form = useForm({
  name: props.group.name,
  description: props.group.description,
});

const createGroup = () => {
  form.post(route("groups.store"), {
    onFinish: () => form.reset(),
  });
};
</script>
<template>
    <AppLayout title="Groups">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Groups
            </h2>
        </template>

        <div>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
  <div>
    <FormSection @submitted="createGroup">
        <template #title>
            Group Information
        </template>

        <template #description>
            Create new group.
        </template>

        <template #form>

            <!-- Role Name -->
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
