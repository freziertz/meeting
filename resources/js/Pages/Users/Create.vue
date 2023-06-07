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
import Checkbox from '@/Components/Checkbox.vue';

const props = defineProps({
  roles: Array,
  accounts: Array,
  organizations: Array,
});

const form = useForm({
    name: 'yahaya',
    email: 'freziern@gmail.com',
    password: '12345678',
    password_confirmation: '12345678',
    terms: false,
    title:'Mr',
    first_name:'Yahaya',
    middle_name:'',
    last_name:'Frezier',
    initials:'FBN',
    designation:'Business development manager',
    organization_id:'1',
    storage_limit:'200',
    pa_email:'zera.msanya@datahousetza.com',
    send_welcome_email:false,
    send_start_guide: false,
    roleIds: [],
});

const createUser = () => {
    form.post(route('users.store'), {
        onFinish: () => form.reset(),
    });
};

</script>
<template>
    <AppLayout title="Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>

        <div>
       <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
                <FormSection @submitted="createUser">
                    <template #title>
                        User Information
                    </template>

                    <template #description>
                        Create new user.
                    </template>

            <template #form>


                <div class="col-span-6 sm:col-span-4">

                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>


            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="title" value="Title" />
                <TextInput
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="title"
                />
                <InputError class="mt-2" :message="form.errors.title" />
            </div>


            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="first_name" value="First Name" />
                <TextInput
                    id="first_name"
                    v-model="form.first_name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="first_name"
                />
                <InputError class="mt-2" :message="form.errors.first_name" />
            </div>



            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="middle_name" value="Middle Name" />
                <TextInput
                    id="middle_name"
                    v-model="form.middle_name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="middle_name"
                />
                <InputError class="mt-2" :message="form.errors.middle_name" />
            </div>


            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="last_name" value="Last name" />
                <TextInput
                    id="last_name"
                    v-model="form.last_name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="last_name"
                />
                <InputError class="mt-2" :message="form.errors.last_name" />
            </div>


            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="initials" value="Initials" />
                <TextInput
                    id="initialsinitials"
                    v-model="form.initials"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="initials"
                />
                <InputError class="mt-2" :message="form.errors.initials" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="designation" value="Designation" />
                <TextInput
                    id="designation"
                    v-model="form.designation"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="designation"
                />
                <InputError class="mt-2" :message="form.errors.designation" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="organization_id" value="organization_id" />
                <TextInput
                    id="organization_id"
                    v-model="form.organization_id"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="organization_id"
                />
                <InputError class="mt-2" :message="form.errors.organization_id" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="storage_limit" value="Storage limit" />
                <TextInput
                    id="storage_limit"
                    v-model="form.storage_limit"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="storage_limit"
                />
                <InputError class="mt-2" :message="form.errors.storage_limit" />
            </div>

            <div class="col-span-6 sm:col-span-4">

                <InputLabel for="pa_email" value="PA email" />
                <TextInput
                    id="pa_email"
                    v-model="form.pa_email"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="pa_email"
                />
                <InputError class="mt-2" :message="form.errors.pa_email" />
            </div>


            <div class="col-span-6 sm:col-span-4">

            <InputLabel for="name" value="Name" />

                <div   v-for="role in roles" :key="role.id" class="col-span-6 sm:col-span-4">
                    <label  class="flex items-center">
                        <Checkbox v-model:checked="form.roleIds" :id="role.id" :value="role.id" />
                        <span class="ml-2 text-sm text-gray-600">{{ role.name }}</span>
                    </label>
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
