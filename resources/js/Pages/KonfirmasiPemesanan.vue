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
    }
  },
  props: {
    isAdmin: String,
  },
  methods: {
    toCurrency(value) {
        if (typeof value !== "number") {
            return value;
        }
        var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
        });
        // cut off the $ sign
        return formatter.format(value).substring(1,);
    },
    getInfoUrl(metodePembayaran){
        if(metodePembayaran.toLowerCase() == 'transfer bank'){
            return 'info-pembayaran-bank';
        }
        
        if(metodePembayaran.toLowerCase() == 'e-wallet'){
            return 'info-pembayaran-e-wallet';
        }

        if(metodePembayaran.toLowerCase() == 'tunai'){
            return 'info-pembayaran-tunai';
        }

    }
  },
}
</script>

<template>
<NavBar title="Konfirmasi Pemesanan"/>
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
            <div id="info" class="m-3">
                    <p>
                        Silakan konfirmasi detail pemesanan Anda
                    </p>
                    <p>
                        Metode Pembayaran: {{ metode }}
                    </p>
                    <p>
                        Rincian:
                    </p>
            </div>
            <div id="detail-transaksi" class="text-black m-5">
                <div id="table-detail">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga/Kg</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody v-for="barang in purchases">
                            <tr>
                            <th scope="row">{{ barang.nama }}</th>
                            <td>Rp{{ toCurrency(barang.harga) }}</td>
                            <td>{{ barang.kuantitas }}</td>
                            <td>Rp{{ toCurrency(barang.total) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="total-biaya">
                        <p>Total: Rp{{ toCurrency(totalPrice) }}</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mx-5 mb-5">
                <a href="/pilih-pemesanan" class="btn btn-danger px-4">Back</a>
                <a :href="getInfoUrl(metode)" class="btn btn-primary px-4">Konfirmasi</a>     
            </div>
        </div>
    </div>
</div>
</template>

<style scoped>
</style>