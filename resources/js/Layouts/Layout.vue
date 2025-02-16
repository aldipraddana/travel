<script setup>
import { route } from '../../../vendor/tightenco/ziggy/src/js';
</script>

<template>
    <Head>
        <title>Travel App</title>
        <meta name="description" content="Travel App">
    </Head>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link">Home</Link>
                    <Link v-if="$page.props.auth.user && $page.props.auth.user.email == 'admin@aldi.com'" :href="route('setting.travel')" class="nav-link">Setting Travel</Link>
                    <Link v-if="$page.props.auth.user && $page.props.auth.user.email == 'admin@aldi.com'" :href="route('home')" class="nav-link">Pesanan Travel</Link>
                </div>
                <div class="space-x-6">
                     <div v-if="$page.props.auth.user">
                        <Link :href="route('logout')" method="post" as="button" class="nav-link">Logout ({{ $page.props.auth.user.email }})</Link>
                     </div>
                     <div v-else>
                         <Link :href="route('login')" class="nav-link">Login</Link>
                     </div>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>