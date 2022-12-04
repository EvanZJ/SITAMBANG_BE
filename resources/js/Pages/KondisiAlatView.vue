<template lang="">
    <NavBar title="Kondisi Peralatan"/>
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
                Kondisi Peralatan
            </h1>
            <div class="tambah">
                <router-link class="tambah-alat" to="/tambahAlat">
                        Tambah Peralatan
                </router-link>
            </div>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Nama Alat</th>
                        <th scope="col">Penanggung Jawab Terakhir</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Aerator I</th>
                        <td>Udin Maharudin</td>
                        <td>Normal</td>
                        <td>
                            <router-link to="/updateAlat" class="router-link">
                                <button type="button" class="btn btn-info">Update</button>
                            </router-link>
                            |
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Aerator II</th>
                        <td>Bambang Rimas</td>
                        <td>Normal</td>
                        <td>
                            <router-link to="" class="router-link">
                                <button type="button" class="btn btn-info">Update</button>
                            </router-link>
                            |
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Aerator III</th>
                        <td>Syaiful Rudi</td>
                        <td>Normal</td>
                        <td>
                            <router-link to="" class="router-link">
                                <button type="button" class="btn btn-info">Update</button>
                            </router-link>
                            |
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Aerator IV</th>
                        <td>Dono Sutono</td>
                        <td>Normal</td>
                        <td>
                            <router-link to="" class="router-link">
                                <button type="button" class="btn btn-info">Update</button>
                            </router-link>
                            |
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
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
    .tambah-alat{
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