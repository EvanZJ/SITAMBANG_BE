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
                    <h1>
                        Riwayat Transaksi Pembeli
                    </h1>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Total Pembelian</th>
                            <th scope="col">Cara Pembayaran</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="post in riwayatTransaksi.data" :key="post.id">
                            <th scope="row">{{ post.created_at }}</th>
                            <td>{{ post.totalPembayaran }}</td>
                            <td>{{ post.caraPembayaran }}</td>
                            <td><a :href="'/pembeli/detail/' + post.id">
                                Detail
                            </a></td>
                          </tr>
                        </tbody>
                      </table>
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
import Navbar from '@/Components/NavBar.vue';
export default {
    components: {
        Bootstrap5Pagination,
        Navbar,
    }
}
</script>
<style lang="">
    
</style>