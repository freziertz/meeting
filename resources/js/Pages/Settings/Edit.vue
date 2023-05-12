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
  setting: Object,
});

const form = useForm({
  _method: "PUT",
  key: props.setting.key,
  value: props.setting.value,
});

const updateSetting = () => {
  form.post(route("settings.update", props.setting.id), {
    onFinish: () => form.reset(),
  });
};

const deleteSetting = () => {
  form.delete(route("settings.destroy", props.setting.id), {
    preserveScroll: true,
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
                <FormSection @submitted="updateSetting">
                    <template #title>
                        Setting Information
                    </template>

                    <template #description>
                        Edit setting.
                    </template>

                    <template #form>

                        <!-- Setting Key -->
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

                        <!-- Setting Value -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="value" value="Value" />
                            <TextInput
                                id="value"
                                v-model="form.value"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="value"
                            />
                            <InputError :message="form.errors.value" class="mt-2" />
                        </div>

                    </template>






                    <template #actions>


                    <DangerButton
                        class="mx-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteSetting"
                    >
                        Delete Setting
                    </DangerButton>




                        <!-- <Link class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition" :href="`/settings/${setting.id}`" >
                            <span>Delete</span>
                            <span class="hidden md:inline">&nbsp;Setting</span>
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
