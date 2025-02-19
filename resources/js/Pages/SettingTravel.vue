<script setup>
import { useForm } from '@inertiajs/vue3';
import { route } from '../../../vendor/tightenco/ziggy/src/js';

defineProps({
    travelDestinations: Object,
});

const form = useForm({
    id: '',
});

const submitDelete = (travelId) => {
    const condition = confirm('Apakah anda yakin ingin menghapus data ini?');
    if (condition) {
        form.id = travelId;
        form.post(route("travel.delete"), {
            onSuccess: () => {
                alert('Berhasil menghapus data')
            },
            onError: () => {
                alert('Terjadi kesalahan')
                console.log('error');
            },
        });
    }
};
</script>
<template>
    <Head title="Setting Travel" description="Travel App" />
    <div class="px-1">
        <div class="grid grid-cols-4">
            <div class="col-span-2 flex items-center">
                <h1>Setting Travel</h1>
            </div>
            <div class="col-span-2">
                <Link :href="route('create.travel')" as="button" class="primary-btn w-[150px] float-end">Tambah Travel</Link>
            </div>
        </div>
        <div class="mt-4">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-slate-300">
                        <th class="border px-4 py-2">Nama Travel</th>
                        <th class="border px-4 py-2">Destination</th>
                        <th class="border px-4 py-2">Waktu Keberangkatan</th>
                        <th class="border px-4 py-2">Kuota</th>
                        <th class="border px-4 py-2">Harga Tiket</th>
                        <th class="border px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="travel in travelDestinations" :key="travel.id">
                        <td class="border px-4 py-2">{{ travel.name }}</td>
                        <td class="border px-4 py-2">{{ travel.destination }}</td>
                        <td class="border px-4 py-2">{{ travel.departure_time }}</td>
                        <td class="border px-4 py-2">{{ travel.quota }}</td>
                        <td class="border px-4 py-2">{{ travel.ticket_price }}</td>
                        <td class="text-center">
                            <form @submit.prevent="submitDelete(travel.id)">
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>