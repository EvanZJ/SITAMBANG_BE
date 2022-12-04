<template lang="">
    <NavBar />
    <div class="container">
        <div class="isi-item">
            <h1>
                Detail Transaksi
            </h1>
            <p>
                Tanggal Transaksi : 10-05-2022 14:32:21
            </p>
            <p>
                Metode Pembayaran : Transfer
            </p>
            <p>
                Rincian : 
            </p>
            <div class="text-center">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga/Kg</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Udang</th>
                        <td>Rp 80.000</td>
                        <td>2 Kg</td>
                        <td>Rp. 160.000</td>
                      </tr>
                      <tr>
                        <th scope="row">Lobster</th>
                        <td>Rp 150.000</td>
                        <td>1 Kg</td>
                        <td>Rp 150.000</td>
                      </tr>
                      <tr>
                        <th scope="row">Total</th>
                        <td colspan="3">Rp 310.000</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <router-link to="/history-penjual">
            <button type="button" class="btn btn-danger btn-submit4">
                Back
            </button>
        </router-link>
        <router-link to="/">
            <button type="button" class="btn btn-primary btn-submit3">
                Cetak Nota
            </button>
        </router-link>
    </div>
</template>
<script>
import NavBar from '../components/NavBarPenjual.vue'
export default {
    components:{
        NavBar
    }
}
</script>
<style lang="css">
    .btn-submit3{
        margin-left: 65%;
        margin-bottom: 1em;
    }
    .btn-submit4{
        margin-left: 13%;
        margin-bottom: 1em;
    }
    .isi-item{
        padding-left: .25em;
        padding-top: .5em;
        padding-right: .25em;
    }
</style>