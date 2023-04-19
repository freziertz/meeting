<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: 'yahaya',
    email: 'freziern@gmail.com',
    password: '12345678',
    password_confirmation: '12345678',
    terms: false,
    title:'Mr',
    first_name:'Frezier',
    middle_name:'Beatus',
    last_name:'Ngonyani',
    initials:'FBN',
    designation:'Business development manager',
    organization_id:'1',
    storage_limit:'200',
    pa_email:'yahaya.frezier@datahousetza.com',
    send_welcome_email:false,
    send_start_guide: false
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div>
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

            <div class="mt-4">
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

            <div class="mt-4">
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

            <div class="mt-4">
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


            <div class="mt-4">
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


            <div class="mt-4">
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



            <div class="mt-4">
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


            <div class="mt-4">
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


            <div class="mt-4">
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

            <div class="mt-4">
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

            <div class="mt-4">
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

            <div class="mt-4">
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

            <div class="mt-4">
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


            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
