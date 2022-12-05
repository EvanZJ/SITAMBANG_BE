<script setup>
import NavBar from '../../components/Navbar.vue'
</script>

<template>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<NavBar title="Pembayaran e-Wallet"/>
<div id="undernav">
    <div id="window" class="mt-3 mb-3 mx-3 border border-bg-gray rounded">
        <div id="title" class="text-black m-3">
            <h2>Pemesanan</h2>
        </div>
        <p class="ms-3">
            Silakan melakukan transfer ke salah satu e-Wallet berikut:
        </p>
        <div id="info-pembayaran" class="row mx-5 mb-3">
            <div id="info-bank" class="col-8">
                <div id="tabel-rek" class="">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Nama Wallet</th>
                            <th scope="col">Nomor Wallet</th>
                            <th scope="col">Nama Pemilik</th>
                            </tr>
                        </thead>
                        <tbody v-for="rekening in eWalletList">
                            <tr>
                            <th scope="row">{{ rekening.namaWallet }}</th>
                            <td>{{ rekening.noWallet }}</td>
                            <td>{{ rekening.namaPemilik }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="detail-pembayaran" class="col-4 d-flex align-items-center justify-content-center">
                <div id="isi-detail" class="border border-bg-black rounded p-3">
                    <p>Total Harga Pemesanan:</p>
                    <p class="fw-bold">Rp{{ toCurrency(total_harga) }}</p>
                    <p>Metode Pembayaran:</p>
                    <p class="fw-bold">{{ metode_pembayaran }}</p>
                </div>
            </div>
        </div>
        <!-- d-flex justify-content-between mx-5 mb-5 -->
        <div class="row mx-5 mb-5">
            <div id="container-back" class="col-8">
                <a href="/pembeli/konfirmasi-pemesanan" class="btn btn-danger px-4">Back</a>
            </div>
            <div id="container-unggah" class="col-4 d-flex align-items-center justify-content-center">
                <button type="button" class="btn btn-primary px-4">Unggah Bukti Pembayaran</button>     
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            eWalletList:[
                {
                    namaWallet: 'BNI',
                    noWallet: '0123456789',
                    namaPemilik: 'Pemilik Udang'
                },
                {
                    namaWallet: 'BCA',
                    noWallet: '0123456789',
                    namaPemilik: 'Pemilik Udang'
                },
                {
                    namaWallet: 'BRI',
                    noWallet: '0123456789',
                    namaPemilik: 'Pemilik Udang'
                },
                {
                    namaWallet: 'Mandiri',
                    noWallet: '0123456789',
                    namaPemilik: 'Pemilik Udang'
                },
                {
                    namaWallet: 'DANAMON',
                    noWallet: '0123456789',
                    namaPemilik: 'Pemilik Udang'
                },
                {
                    namaWallet: 'CIMB-NIAGA',
                    noWallet: '0123456789',
                    namaPemilik: 'Pemilik Udang'
                }
            ],
        }
    },
    props:[
        'total_harga',
        'metode_pembayaran',
    ],
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


<style scoped>
</style>