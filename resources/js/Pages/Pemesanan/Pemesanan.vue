<script setup>
import NavBar from '../../components/NavBar.vue'
</script>


<template>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<NavBar title="Pemesanan"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div id="all" class="bg-white">
    <div id="undernav">
        <div id="window-beli" class="mt-3 mb-3 mx-3 border border-bg-gray rounded">
            <div id="title" class="text-black m-3">
                <h2>Pemesanan</h2>
            </div>

            <div id="barang-beli" class="text-black m-5">
                <h4 v-if="msg">{{ msg }}</h4>
                <form action="/pembeli/proses-pemesanan" method="POST">
                    <input type="hidden" name="_token" :value="token">
                    <ul v-for="(barang) in stocks">
                            <li class="list-group-item border border-bg-gray rounded ps-3 fs-4 d-flex justify-content-between">
                                <div class="">{{ barang.name }}, {{ toCurrency(barang.harga) }}/kg</div>
                                <div class="">Stock: {{ barang.total_persediaan }}</div>    
                                <div class="">
                                    Buy:
                                    <input type="number" class="form-control" :name="('beli'+barang.id)"
                                    min="0" :max="barang.total_persediaan" :value="total_beli_stock[barang.id]">
                                </div>
                            </li>
                    </ul>
                    <div class="form-group">
                        <input style="cursor:pointer" type="submit" class="btn btn-primary px-4" id="submit" value="Next">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>    
export default {
    props:[
        'stocks',
        'token',
        'total_beli_stock',
        'msg',
    ],
    components:{
        NavBar
    },
    methods: {
        toCurrency(value) {
        if (typeof value !== "number") {
            return value;
        }
        var formatter = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" });
        return formatter.format(value);
        },
        incrementBeli(barang){
            barang.beli++;
            barang.stock--;
            if(barang.stock < 0){
                barang.stock++;
                barang.beli--;
            }
        },
        decrementBeli(barang){
            barang.beli--;
            barang.stock++;
            if(barang.beli < 0){
                barang.beli=0;
                barang.stock--;
            }
        },
    }
}
</script>


<style scoped>
</style>