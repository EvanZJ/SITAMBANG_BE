<template lang="">
    <NavBar />
    <div class="container">
      {{ stock }}
        <form method="POST" :action="'/karyawan/stock/edit/'+stock.id" class="isi-item">
        <input type="hidden" name="_token" :value="csrf">
            <h1>
                Update Stok
            </h1>
            <div class="text-center">
                <div class="row g-2">
                  <div class="col-3">
                    <div class="p-2 ">Nama Produk : </div>
                  </div>
                  <div class="col-9">
                    <div class="p-1">
                        <div class="input-group mb-3">
                             <input type="text" name="name" class="form-control" placeholder="Nama Produk" :value="stock.name">
                             {{ stock.name }}
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
                          <textarea rows="5" name="description" class="form-control" placeholder="Deskripsi" :value="stock.description"></textarea>
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
                            <input type="number" name="total_persediaan" class="form-control" placeholder="KG" :value="stock.total_persediaan">
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
                            <input type="number" name="harga" class="form-control" placeholder="Rupiah" :value="stock.harga">
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <button type="submit" class="btn btn-primary btn-submit">
              Ubah Stok
              </button>
        </form>
            
    </div>
</template>
<script>
import NavBar from '../components/NavBarPenjual.vue'
export default {
    components:{
        NavBar
    },
    props:[
      'stock', 'csrf',
    ],
}
</script>
<style lang="css">
    .btn-submit{
        margin-left: 84%;
        margin-bottom: 2em;
        padding-left: 1em;
        padding-right: 1em;
    }
</style>