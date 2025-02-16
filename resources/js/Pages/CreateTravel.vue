<script setup>
import { useForm } from '@inertiajs/vue3';
import { route } from '../../../vendor/tightenco/ziggy/src/js';
import TextInput from './Components/TextInput.vue';

defineProps({
    travelDestinations: Object,
});

const form = useForm({
   name: '',
   destination: '',
   departure_time: '',
   quota: '',
   ticket_price: '',
});

const submit = () => {
    form.post(route("travel.store"), {
        onSuccess: () => {
            form.reset();
        },
        onError: () => {
            console.log('error');
        },
    });
};

</script>
<template>
    <Head title="Setting Travel" description="Travel App" />
    <h1 class="title">Input Destinasi Travel Baru</h1>
    <div class="w-3/4 mx-auto">
        <form @submit.prevent="submit">
            <TextInput name="Nama Travel" type="text" v-model="form.name" :message="form.errors.name" />
            <TextInput name="Destinasi" type="text" v-model="form.destination" :message="form.errors.destination" />
            <div class="grid grid-cols-3 gap-2">
                <TextInput name="Waktu Keberangkatan" type="datetime-local" v-model="form.departure_time" :message="form.errors.departure_time" />
                <TextInput name="Kuota" type="number" v-model="form.quota" :message="form.errors.quota" />
                <TextInput name="Harga Tiket" type="number" v-model="form.ticket_price" :message="form.errors.ticket_price" />
            </div>
            <div class="w-full flex justify-between mt-4">
                <button type="submit" class="primary-btn w-[180px]">Simpan</button>
                <Link :href="route('setting.travel')" as="button" class="secondary-btn w-[180px] float-end">Kembali</Link>
            </div>
        </form>
    </div>
</template>