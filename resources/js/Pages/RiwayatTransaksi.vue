<script setup>
import { ref } from 'vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
const riwayatTransaksi = ref({});
const getResults = async (page = 1) => {
    const response = await fetch(`http://127.0.0.1:8000/karyawan/get-pagination?page=${page}`);
    riwayatTransaksi.value = await response.json();
}
getResults();
</script>
<template lang="">
    <!-- JavaScript Bundle with Popper -->
    <NavbarPenjual title="SITAMBANG" :token="token"/>
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
                            <td>{{ toCurrency(post.totalPembayaran) }}</td>
                            <td>{{ post.caraPembayaran }}</td>
                            <td>
                                <a :href="'/karyawan/detail/' + post.id">
                                    <button class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed-fill" viewBox="0 0 16 16">
                                            <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5Zm0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5ZM4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1Z"/>
                                        </svg>
                                    </button>
                                </a> 
                                <form method="POST" :action="'/karyawan/delete-pemesanan/' + post.id" v-if="isAdmin"> 
                                    |
                                    <input type="hidden" name="_token" :value="token">
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" v-on:click="" v-if="isAdmin">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Transaction</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure want to delete this transaction?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
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
    
      <!-- Modal -->
</template>
<script>
import NavbarPenjual from '@/Components/NavBarPenjual.vue';
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
export default {
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
    props: {
        token: String,
        isAdmin: Boolean,
    }
}
</script>
<style lang="">
    
</style>