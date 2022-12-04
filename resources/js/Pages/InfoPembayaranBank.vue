<script setup>
import NavBar from '../components/Navbar.vue'
</script>

<script>
export default {
  data() {
    return {
        navTitle:'Pemesanan',
        date:'10-05-2022 14:32:21',
        metode: 'Transfer Bank',
        purchases: [
            {   
                nama:'Udang', 
                harga:80000,
                kuantitas: 2,
                total:160000
            },
            {   
                nama:'Lobster', 
                harga:150000,
                kuantitas: 1,
                total:150000
            },
        ],
        totalPrice: 310000,
        buyerName:'Udin',
        rekeningList:[
            {
                namaBank: 'BNI',
                noRek: '0123456789',
                namaPemilik: 'Pemilik Udang'
            },
            {
                namaBank: 'BCA',
                noRek: '0123456789',
                namaPemilik: 'Pemilik Udang'
            },
            {
                namaBank: 'BRI',
                noRek: '0123456789',
                namaPemilik: 'Pemilik Udang'
            },
            {
                namaBank: 'Mandiri',
                noRek: '0123456789',
                namaPemilik: 'Pemilik Udang'
            },
            {
                namaBank: 'DANAMON',
                noRek: '0123456789',
                namaPemilik: 'Pemilik Udang'
            },
            {
                namaBank: 'CIMB-NIAGA',
                noRek: '0123456789',
                namaPemilik: 'Pemilik Udang'
            }
        ],
    }
  },
  methods: {
    toCurrency(value) {
        if (typeof value !== "number") {
            return value;
        }
        var formatter = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" });
        return formatter.format(value);
    },
  },
}
</script>

<template>
<NavBar title="Pembayaran Transfer Bank"/>
<div id="all" class="bg-white">
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <h2 class="text-white">{{ navTitle }}</h2>
        </div>
    </nav>
    <!-- <NavBar></NavBar> -->
    <div id="undernav">
        <div id="window" class="mt-3 mb-3 mx-3 border border-bg-gray rounded">
            <div id="title" class="text-black m-3">
                <h2>Pemesanan</h2>
            </div>
            <p class="ms-3">
                Silakan melakukan transfer ke salah satu rekening berikut:
            </p>
            <div id="info-pembayaran" class="row mx-5 mb-3">
                <div id="info-bank" class="col-8">
                    <div id="tabel-rek" class="">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">Nama Bank</th>
                                <th scope="col">Nomor Rekening</th>
                                <th scope="col">Nama Pemilik</th>
                                </tr>
                            </thead>
                            <tbody v-for="rekening in rekeningList">
                                <tr>
                                <th scope="row">{{ rekening.namaBank }}</th>
                                <td>{{ rekening.noRek }}</td>
                                <td>{{ rekening.namaPemilik }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="detail-pembayaran" class="col-4 d-flex align-items-center justify-content-center">
                    <div id="isi-detail" class="border border-bg-black rounded p-3">
                        <p>Total Harga Pemesanan:</p>
                        <p class="fw-bold">Rp{{ toCurrency(totalPrice) }}</p>
                        <p>Metode Pembayaran:</p>
                        <p class="fw-bold">{{ metode }}</p>
                    </div>
                </div>
            </div>
            <!-- d-flex justify-content-between mx-5 mb-5 -->
            <div class="row mx-5 mb-5">
                <div id="container-back" class="col-8">
                    <a href="/konfirmasi-pemesanan" class="btn btn-danger px-4">Back</a>
                </div>
                <div id="container-unggah" class="col-4 d-flex align-items-center justify-content-center">
                    <button type="button" class="btn btn-primary px-4">Unggah Bukti Pembayaran</button>     
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped>
</style>