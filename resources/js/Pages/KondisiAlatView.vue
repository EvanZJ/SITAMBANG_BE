<template lang="">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <NavBar title="Kondisi Peralatan" :token="token"/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                                <a class="tambah-alat" href="/karyawan/alat/create">
                                        Tambah Peralatan
                                </a>
                            </div>
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Alat</th>
                                        <th scope="col">Penanggung Jawab Terakhir</th>
                                        <th scope="col">Kondisi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(alat, idx) in alats" :key="idx">
                                        <td>{{idx+1}}</td>
                                        <td scope="row">{{ alat.name }}</td>
                                        <td>{{ karyawans[idx].name }}</td>
                                        <td>{{ alat.kondisi }}</td>
                                        <td>
                                            <a :href="'/karyawan/alat/edit/'+alat.id" class="router-link">
                                                <button type="button" class="btn btn-info">Update</button>
                                            </a>
                                            <form method="POST" :action="'/karyawan/alat/delete/'+alat.id">
                                            <input type="hidden" name="_token" :value="csrf">
                                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Delete
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import NavBar from '@/Components/NavBarPenjual.vue'
export default {
    components:{
        NavBar
    },
    props : {
        alats: Array,
        csrf: String,
        karyawans: Array,
        token: String
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