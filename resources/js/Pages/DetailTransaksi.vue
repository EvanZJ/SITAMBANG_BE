<template lang="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div>
        <NavBar title="Detail Transaksi"/>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1>
                            Detail Transaksi
                        </h1>
                        <p>
                            <label>
                                Tanggal Transaksi : 
                            </label>
                            {{ data[0].created_at }}
                        </p>
                        <p>
                            <label>
                                Pembeli : 
                            </label>
                            {{ nama.name }}
                        </p>
                        <p>
                            <label>
                                Tipe Pembayaran : 
                            </label>
                            {{ data[0].caraPembayaran }}
                        </p>
                        <p>
                            Rincian:
                        </p>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="p in new_product" :key="p.id">
                                <th scope="row">{{ p.nama_product }}</th>
                                <td>{{ toCurrency(p.harga) }}</td>
                                <td>{{ p.kuantitas }}</td>
                                <td>{{ toCurrency(p.kuantitas * p.harga) }}</td>
                              </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between mx-5 mb-5">
                            <a href="/pembeli/riwayat-transaksi" class="btn btn-danger px-4">Back</a>
                            <a href="/pembeli/cetak-nota" class="btn btn-primary px-4">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import NavBar from '@/Components/NavBar.vue';
export default {
    props: {
        data: Object,
        product: Object,
        list_product: Array,
        nama: Object,
    },
    components: {
        NavBar,
    },
    data() {
        return {
            new_product: Object,
        }
    },
    methods: {
        getNamaProduct() {
            this.new_product = this.product.map((p) => {
                return {
                    ...p,
                    nama_product: this.list_product.find((lp) => lp.id === p.stock_id).name,
                    harga: this.list_product.find((lp) => lp.id === p.stock_id).harga,
                }
            });
        },
        toCurrency(value) {
            if (typeof value !== "number") {
                return value;
            }
            var formatter = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" });
            return formatter.format(value);
        },
    },
    mounted() {
        this.getNamaProduct();
        console.log(this.new_product)

    }
}
</script>
<style lang="">
    
</style>