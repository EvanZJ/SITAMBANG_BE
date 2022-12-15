<script setup>
import NavBar from '../../components/Navbar.vue'
</script>

<template>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<NavBar title="Pemesanan" :token="token"/>
<div id="window-beli" class="mt-3 mb-3 mx-3 border border-bg-gray rounded">
    <div id="title" class="text-black m-3">
        <h2>Pemesanan</h2>
    </div>

    <div id="meseji" v-if="adaPesanan">
        <h1>Pemesanan Anda Berhasil</h1>
        <svg width="224" height="224" viewBox="0 0 311 311" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M155.5 0C69.6216 0 0 69.6216 0 155.5C0 241.378 69.6216 311 155.5 311C241.378 311 311 241.378 311 155.5C311 69.6216 241.378 0 155.5 0ZM222.902 129.206C224.143 127.788 225.088 126.135 225.681 124.346C226.274 122.557 226.503 120.667 226.355 118.788C226.207 116.909 225.685 115.078 224.819 113.404C223.953 111.729 222.761 110.245 221.313 109.039C219.864 107.832 218.19 106.927 216.387 106.377C214.584 105.827 212.689 105.643 210.814 105.837C208.939 106.03 207.121 106.596 205.468 107.502C203.815 108.408 202.36 109.635 201.189 111.112L140.402 184.041L108.949 152.574C106.283 149.999 102.712 148.574 99.0054 148.606C95.2989 148.638 91.7533 150.125 89.1323 152.746C86.5113 155.367 85.0246 158.913 84.9924 162.619C84.9602 166.326 86.3851 169.896 88.9601 172.563L131.369 214.972C132.758 216.36 134.421 217.443 136.252 218.153C138.083 218.863 140.042 219.184 142.004 219.095C143.965 219.005 145.887 218.509 147.646 217.636C149.405 216.763 150.963 215.533 152.22 214.025L222.902 129.206Z" fill="#198754"/>
        </svg>
        <h1>Terimakasih telah melakukan pesanan</h1>
    </div>



    <div class="d-flex flex-row-reverse me-5 mb-5">
        <a href="/dashboard" class="btn btn-primary px-4">Selesai</a>
    </div>
</div>
</template>

<script>
export default{
    data(){
        return{

        }
    },
    props:[
        'token',
        'adaPesanan',
    ]
}
</script>


<style scoped>
#meseji{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
</style>