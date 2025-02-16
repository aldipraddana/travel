<script setup>

</script>

<template>
    <Head title="Home" description="Travel App" />
    <div class="text-xl mt-[30vh] text-center">
        <h1>Selamat Datang {{  $page.props.auth.user ? ($page.props.auth.user.name).toUpperCase() : '' }}</h1>
        <h1>Di Website Booking Travel Aldi 👌</h1>
    </div>
    <div>
        <div v-if="!$page.props.auth.user" class="text-center mt-4">
            <p>Harap Login agar bisa melakukan pemesanan travel 😊</p>
        </div>
    </div>
</template>