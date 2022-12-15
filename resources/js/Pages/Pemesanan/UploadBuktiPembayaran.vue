<script setup>
import NavBar from '@/Components/NavBar.vue'
</script>

<template>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<NavBar title="Upload Bukti Pembayaran" :token="token"/>
<div id="undernav">
    <div id="window" class="mt-3 mb-3 mx-3 border border-bg-gray rounded">
        <div id="title" class="text-black m-3">
            <h2>Pemesanan</h2>
        </div>

        <div id="content" class="text-black m-5">
            <h4 v-if="msg">{{ msg }}</h4>
            <div id="info">
                <p>
                    Silahkan unggah bukti pembayaran anda, bisa berupa foto ataupun screenshot bukti pembayaran anda.
                    Format yang diterima JPG, JPEG, PNG, PDF.
                </p>
            </div>
            <div id="upload">
                <form action="/pembeli/store-pemesanan" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" :value="token">
                    <img src="" alt="" id="preview">
                    <input type="file" name="bukti-pembayaran" accept="image/png, image/jpeg, application/pdf" class="mb-4" @change="loadFile"/>
                    <div class="form-group" id="submitpart">
                        <a href="javascript:history.back()" class="btn btn-danger px-4">Back</a>
                        <input style="cursor:pointer" type="submit" class="btn btn-primary px-4" id="submit" value="Unggah Bukti">
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: [
        // isAdmin: String,
        'token',
        'msg',
    ],
    methods: {
        toCurrency(value) {
            if (typeof value !== "number") {
                return value;
            }
            var formatter = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" });
            return formatter.format(value);
        },
        loadFile(event){
            let output = document.getElementById('preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            // output.onload = function() {
            //     URL.revokeObjectURL(output.src); // free memory      
            // };
            output.style = 'width:320px; margin-bottom:10px';
        },
    },
}
</script>

<style scoped>
#upload{
    width: 100%;
}
#submitpart{
    /* width: 500px; */
    margin-top: 10px;
    display: flex;
    justify-content: space-between;
}
</style>