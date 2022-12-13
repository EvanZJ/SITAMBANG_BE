<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/NavBar.vue';
import NavbarPenjual from '@/Components/NavBarPenjual.vue';
defineProps({
    isPembeli: Boolean,
    isKaryawan: Boolean,
    token: String,
});
</script>

<template>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <Head title="Dashboard" /> -->
    <Navbar v-if="isPembeli" title="SITAMBANG" :token="token"/>
    <NavbarPenjual v-if="isKaryawan" title="SITAMBANG" :token="token"/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <label>
                        Selamat Datang
                    </label>
                    <div>
                        <div class="white-box">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style type="css">

</style>