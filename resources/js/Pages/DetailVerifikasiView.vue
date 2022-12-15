<template lang="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div id="canvas">
        <NavBar v-if="isPembeli" title="Detail Transaksi"/>
        <NavbarPenjual v-else title="Detail Transaksi"/>
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
                            <label>
                                Total : 
                            </label>
                            {{ toCurrency(data[0].totalPembayaran) }}
                        </p>
                        <p>
                            <label>
                                Bukti Pembayaran : 
                            </label>
                            <img :src="proof" style="width:224px;">
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
                            <a href="/karyawan/verifikasi" class="btn btn-danger px-4">Back</a>
                            <form method="post" :action="'/karyawan/verifikasi/'+data[0].id">
                                <input type="hidden" name="_token" :value="csrf">
                                <button type="submit" class="btn btn-success px-4">Verify</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import NavBar from '@/Components/NavBar.vue';
import NavbarPenjual from '@/Components/NavbarPenjual.vue';
import html2PDF from "jspdf-html2canvas";
import html2canvas from "html2canvas";

export default {
    props: {
        data: Object,
        product: Object,
        list_product: Array,
        nama: Object,
        csrf: String,
        proof:String
    },
    components: {
        NavBar,
        NavbarPenjual,
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