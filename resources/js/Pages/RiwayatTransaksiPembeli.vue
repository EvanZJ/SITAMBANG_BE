<script setup>
import { ref } from 'vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
const riwayatTransaksi = ref({});
const getResults = async (page = 1) => {
    const response = await fetch(`http://127.0.0.1:8000/pembeli/get-pagination?page=${page}`);
    riwayatTransaksi.value = await response.json();
}
getResults();
</script>
<template lang="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <Navbar title="SITAMBANG"/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <label>
                        Selamat Datang
                    </label>
                    <ul>
                        <li v-for="post in riwayatTransaksi.data" :key="post.id">
                            {{ post.date }} | {{ post.total }} }}
                        </li>
                      </ul>
                    <Bootstrap5Pagination
                        :data="riwayatTransaksi"
                        @pagination-change-page="getResults"
                        :limit="-1"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Navbar from '@/Components/Navbar.vue';
export default {
    components: {
        Bootstrap5Pagination,
        Navbar,
    }
}
</script>
<style lang="">
    
</style>