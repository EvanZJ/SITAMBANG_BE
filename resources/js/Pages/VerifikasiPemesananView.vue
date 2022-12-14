<script setup>
import { ref } from 'vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
const riwayatTransaksi = ref({});
const getResults = async (page = 1) => {
    const response = await fetch(`http://127.0.0.1:8000/karyawan/verifikasi/get-pagination?page=${page}`);
    riwayatTransaksi.value = await response.json();
}
getResults();
</script>
<template lang="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <NavbarPenjual title="SITAMBANG" :token="token"/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>
                        Verifikasi Pemesanan
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
                            <td>{{ toCurrency(post.totalPembayaran) }}</td>
                            <td>{{ post.caraPembayaran }}</td>
                            <td>
                                <a :href="'/karyawan/verifikasi/' + post.id">
                                    <button class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed-fill" viewBox="0 0 16 16">
                                            <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5Zm0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5ZM4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1Z"/>
                                        </svg>
                                    </button>
                                </a> | 
                                <form method="post" :action="'/karyawan/verifikasi/'+post.id">
                                    <input type="hidden" name="_token" :value="csrf">
                                    <button class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                          <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
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
import NavbarPenjual from '@/Components/NavBarPenjual.vue';
export default {
    props: [
        'csrf', 'token',
    ],
    components: {
        Bootstrap5Pagination,
        NavbarPenjual,
    },
    methods: {
        toCurrency(number) {
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });
            return formatter.format(number);
        }
    },
}
</script>
<style lang="">
    
</style>