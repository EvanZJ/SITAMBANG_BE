<template lang="">
    <NavBar title="Verifikasi Pemesanan"/>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
                Apakah Anda yakin?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
            </div>
          </div>
        </div>
      </div>
    <div class="container">
        <div class="isi-item">
            <h1>
                Verifikasi Pemesanan
            </h1>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Pembeli</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">10-05-2022 14:32:21</th>
                        <td>Udin Sukmadi</td>
                        <td>Transfer</td>
                        <td>
                            <router-link to="/detailVerifikasi" class="router-link">
                                <button type="button" class="btn btn-info">Detail</button>
                            </router-link>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">10-05-2022 14:32:21</th>
                        <td>Udin Sukmadi</td>
                        <td>Transfer</td>
                        <td>
                            <router-link to="/detailVerifikasi" class="router-link">
                                <button type="button" class="btn btn-info">Detail</button>
                            </router-link>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">10-05-2022 14:32:21</th>
                        <td>Udin Sukmadi</td>
                        <td>Transfer</td>
                        <td>
                            <router-link to="/detailVerifikasi" class="router-link">
                                <button type="button" class="btn btn-info">Detail</button>
                            </router-link>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">10-05-2022 14:32:21</th>
                        <td>Udin Sukmadi</td>
                        <td>Transfer</td>
                        <td>
                            <router-link to="/detailVerifikasi" class="router-link">
                                <button type="button" class="btn btn-info">Detail</button>
                            </router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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
    .btn-submit{
        margin-left: 84%;
        margin-bottom: 2em;
        padding-left: 1em;
        padding-right: 1em;
    }
    .tambah{
        width: 100%;
    }
    .table{
        margin-bottom: 1em;
    }
</style>