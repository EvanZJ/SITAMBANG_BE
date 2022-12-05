<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/NavBar.vue';
import NavbarPenjual from '@/Components/NavBarPenjual.vue';
defineProps({
    isPembeli: Boolean,
    isKaryawan: Boolean,
});
</script>

<template>
    <!-- <Head title="Dashboard" /> -->
    <Navbar v-if="isPembeli" title="SITAMBANG"/>
    <NavbarPenjual v-if="isKaryawan" title="SITAMBANG"/>
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