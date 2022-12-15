<template lang="">
    <NavBar title="Riwayat Transaksi"/>
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
                Riwayat Transaksi
            </h1>
            <div class="tambah">
                <router-link to="/tambah-transaksi">
                    <a href="/" class="tambah-transaksi">
                        Tambah Transaksi
                    </a>
                </router-link>
            </div>
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
                        <th scope="row">10-05-2022 14:32:31</th>
                        <td>Udin Sukmadi</td>
                        <td>Transfer</td>
                        <td>
                            <router-link to="/history-update-penjual" class="router-link">
                                <button type="button" class="btn btn-info">Update</button>
                            </router-link>
                            |
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
                            |
                            <router-link to="/detail" class="router-link">
                                <button type="button" class="btn btn-dark">Detail</button>
                            </router-link>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">10-05-2022 14:32:31</th>
                        <td>Udin Sukmadi</td>
                        <td>Transfer</td>
                        <td>
                            <router-link to="" class="router-link">
                                <button type="button" class="btn btn-info">Update</button>
                            </router-link>
                            |
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
                            |
                            <router-link to="" class="router-link">
                                <button type="button" class="btn btn-dark">Detail</button>
                            </router-link>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">10-05-2022 14:32:31</th>
                        <td>Udin Sukmadi</td>
                        <td>Transfer</td>
                        <td>
                            <router-link to="" class="router-link">
                                <button type="button" class="btn btn-info">Update</button>
                            </router-link>
                            |
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
                            |
                            <router-link to="" class="router-link">
                                <button type="button" class="btn btn-dark">Detail</button>
                            </router-link>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">10-05-2022 14:32:31</th>
                        <td>Udin Sukmadi</td>
                        <td>Transfer</td>
                        <td>
                            <router-link to="" class="router-link">
                                <button type="button" class="btn btn-info">Update</button>
                            </router-link>
                            |
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
                            |
                            <router-link to="" class="router-link">
                                <button type="button" class="btn btn-dark">Detail</button>
                            </router-link>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">10-05-2022 14:32:31</th>
                        <td>Udin Sukmadi</td>
                        <td>Transfer</td>
                        <td>
                            <router-link to="" class="router-link">
                                <button type="button" class="btn btn-info">Update</button>
                            </router-link>
                            |
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
                            |
                            <router-link to="" class="router-link">
                                <button type="button" class="btn btn-dark">Detail</button>
                            </router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import NavBar from '@/Components/NavBarPenjual.vue'
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
    .tambah-transaksi{
        margin-left: 75%;
        text-decoration: underline;
        color: black;
        font-size: 20px;
    }
    .tambah{
        width: 100%;
    }
    .table{
        margin-bottom: 1em;
    }
</style>