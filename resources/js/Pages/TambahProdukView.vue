<script>
import NavBar from "@/Components/NavBarPenjual.vue";
export default {
  components: {
    NavBar,
  },
  props:[
    'csrf', 'token',
  ]
};
</script>


<template lang="">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <NavBar title="Tambah Barang" :token="token"/>
    <div class="container">
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form method="POST" action="/stock/create" class="isi-item">
                  <input type="hidden" name="_token" :value="csrf">
                      <h1>
                          Tambah Produk
                      </h1>
                      <div class="text-center">
                          <div class="row g-2">
                            <div class="col-3">
                              <div class="p-2 ">Nama Produk : </div>
                            </div>
                            <div class="col-9">
                              <div class="p-1">
                                  <div class="input-group mb-3">
                                      <input type="text" name="name" class="form-control" placeholder="Nama Produk">
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="row g-2">
                            <div class="col-3">
                              <div class="p-2 ">Deskripsi : </div>
                            </div>
                            <div class="col-9">
                              <div class="p-1">
                                  <div class="input-group mb-3">
                                    <textarea rows="5" class="form-control" name="description" placeholder="Deskripsi" ></textarea>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="row g-2">
                              <div class="col-3">
                                <div class="p-2 ">Jumlah Stok : </div>
                              </div>
                              <div class="col-9">
                                <div class="p-1">
                                  <div class="input-group mb-3">
                                      <input type="number" name="total_persediaan" class="form-control" placeholder="Kg">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row g-2">
                              <div class="col-3">
                                <div class="p-2 ">Harga Stok (Rupiah) : </div>
                              </div>
                              <div class="col-9">
                                <div class="p-1">
                                  <div class="input-group mb-3">
                                      <input type="number" name="harga" class="form-control" placeholder="Rupiah">
                                  </div>
                                </div>
                              </div>
                            </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-submit">
                        Tambah Produk
                        </button>
                          
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>
  
</template>

<style lang="css">
.btn-submit {
  margin-left: 80%;
  margin-bottom: 2em;
  padding-left: 1em;
  padding-right: 1em;
}
</style>