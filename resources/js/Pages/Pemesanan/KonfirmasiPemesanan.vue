<script setup>
import NavBar from '../../components/NavBar.vue'
</script>

<template>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<NavBar title="Konfirmasi Pemesanan"/>
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
                    Metode Pembayaran: {{ metode_pembayaran }}
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
                    <tbody v-for="data in data_pembelian">
                        <tr>
                        <th scope="row">{{ data.stock.name }}</th>
                        <td>{{ toCurrency(data.stock.harga) }}</td>
                        <td>{{ data.total_pembelian }}</td>
                        <td>{{ toCurrency(data.total_pembelian * data.stock.harga) }}</td>
                        </tr>
                    </tbody>
                </table>
                <div id="total-biaya">
                    <p>Total: {{ toCurrency(total_harga) }}</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mx-5 mb-5">
            <a href="/pembeli/pilih-pembayaran" class="btn btn-danger px-4">Back</a>
            <a :href="getInfoUrl(metode_pembayaran)" class="btn btn-primary px-4">Konfirmasi</a>     
        </div>
    </div> 
</div>
</template>

<script>
export default {
    props: [
        'data_pembelian',
        'total_harga',
        'metode_pembayaran'
        // isAdmin: String,
    ],
    methods: {
        toCurrency(value) {
            if (typeof value !== "number") {
                return value;
            }
            var formatter = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" });
            return formatter.format(value);
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


    <style scoped>
    </style>