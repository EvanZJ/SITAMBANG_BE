<template lang="">
    <NavBar />
    <div class="container">
        <div class="isi-item">
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
                            <select class="form-select" id="inputGroupSelect01">
                              <option selected>Nama Produk</option>
                              <option value="1">Udang</option>
                              <option value="2">Kepiting</option>
                              <option value="3">Lobster</option>
                            </select>
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
                            <input type="number" class="form-control" placeholder="KG" aria-label="Username" aria-describedby="addon-wrapping">
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
                            <input type="number" class="form-control" placeholder="Rupiah" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <router-link to="/stockPenjual">
            <button type="button" class="btn btn-primary btn-submit">
                Ubah Stok
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
    .btn-submit{
        margin-left: 84%;
        margin-bottom: 2em;
        padding-left: 1em;
        padding-right: 1em;
    }
</style>