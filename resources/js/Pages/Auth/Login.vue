<script setup>
// import { reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import TextInput from '../Components/TextInput.vue';

const form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    form.post(route("login"), {
        onSuccess: () => {
            form.reset();
        },
        onError: () => {
            form.reset("password");
            console.log('error');
        },
    });
};

</script>

<template>
    <h1 class="title mt-[17vh]">Login to your account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <TextInput name="email" type="email" v-model="form.email" :message="form.errors.email" />
            <TextInput name="password" type="password" v-model="form.password" :message="form.errors.password" />
            <div>
                <p class="text-slate-600 mb-2">Don't have an account?
                    <a :href="route('register')" class="text-link underline">Register</a>
                </p>
                <button type="submit" class="primary-btn">Login</button>
            </div>
            <div class="mt-4 text-red-600 text-sm">
                *Admin Login email : admin@aldi.com, password : password
            </div>
        </form>
    </div>
</template>