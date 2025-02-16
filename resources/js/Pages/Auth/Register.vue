<script setup>
// import { reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import TextInput from '../Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route("register"), {
        onSuccess: () => {
            form.reset();
        },
        onError: () => {
            form.reset("password", "password_confirmation");
            console.log('error');
        },
    });
};

</script>

<template>
    <h1 class="title">Register</h1>
    <div class="w-2/4 mx-auto mb-6">
        <form @submit.prevent="submit">
            <TextInput name="name" type="text" v-model="form.name" :message="form.errors.name" />
            <TextInput name="email" type="email" v-model="form.email" :message="form.errors.email" />
            <TextInput name="password" type="password" v-model="form.password" :message="form.errors.password" />
            <TextInput name="password confirmation" type="password" v-model="form.password_confirmation" :message="form.errors.password_confirmation" />
            <div>
                <p class="text-slate-600 mb-2">Already a user? 
                    <a :href="route('login')" class="text-link underline">Login</a>
                </p>
                <button type="submit" class="primary-btn">Register</button>
            </div>
        </form>
    </div>
</template>