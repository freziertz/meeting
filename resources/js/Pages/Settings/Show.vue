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
  setting: Object,
});

const form = useForm({
  key: props.setting.key,
  value: props.setting.value,
});

const createSetting = () => {
  form.post(route("settings.store"), {
    onFinish: () => form.reset(),
  });
};
</script>
<template>
    <AppLayout title="Settings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Settings
            </h2>
        </template>

        <div>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
  <div>
    <FormSection @submitted="createSetting">
        <template #title>
            Setting Information
        </template>

        <template #description>
            Create new setting.
        </template>

        <template #form>

            <!-- Role Key -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="key" value="Key" />
                <TextInput
                    id="key"
                    v-model="form.key"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="key"
                />
                <InputError :message="form.errors.key" class="mt-2" />
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
