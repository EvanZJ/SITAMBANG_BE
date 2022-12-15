<script>
import NavBar from '@/Components/NavBar.vue'
export default {
  data() {
    return {
        barangList: [
            {   
                nama:'Udang', 
                harga:80000,
                stock: 40,
                beli:0
            },
            {   
                nama:'Lobster', 
                harga:150000,
                stock:65,
                beli:0
            },
            {   
                nama:'Kepiting', 
                harga:160000,
                stock:100,
                beli:0
            },
        ],
    }
  },
  components:{
    NavBar
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
    }

  },
}
</script>

<template>
<NavBar title="Pemesanan"/>
<div id="all" class="bg-white">
    
    <!-- <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <h2 class="text-white">Pemesanan</h2>
        </div>
    </nav> -->
    <div id="undernav">
        <div id="window-beli" class="mt-3 mb-3 mx-3 border border-bg-gray rounded">
            <div id="title" class="text-black m-3">
                <h2>Pemesanan</h2>
            </div>

            <div id="barang-beli" class="text-black m-5">
                <ul v-for="(barang, index) in barangList">
                    <li class="list-group-item border border-bg-gray rounded ps-3 fs-4 d-flex justify-content-between">
                        <div class="">{{ barang.nama }}, Rp{{ toCurrency(barang.harga) }}/kg</div>
                        <div class="">Stock: {{ barang.stock }}</div>
                        <div class="">
                            Buy:
                            <!-- <button @click="decrementBeli(barang)" class="mx-2">-</button>
                            {{ barang.beli }} Kg
                            <button @click="incrementBeli(barang)" class="mx-2">+</button> -->
                            <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" :id="index"
                            min="0" :max="barang.stock">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="d-flex flex-row-reverse me-5 mb-5">
                <button type="button" class="btn btn-primary px-4">Next</button>
            </div>
            
        </div>
    </div>
</div>
</template>

<style scoped>
</style>