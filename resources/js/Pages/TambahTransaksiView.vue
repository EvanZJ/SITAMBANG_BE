<template lang="">
    <NavBar />
    <div class="container">
        <div class="isi-item">
            <h1>
                Tambah Transaksi
            </h1>
            <div class="text-center">
                <div class="row g-2">
                  <div class="col-3">
                    <div class="p-2 ">Nama Pembeli : </div>
                  </div>    
                  <div class="col-9">
                    <div class="p-1">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama Pembeli" value="Udin Sukmadi" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row g-2">
                    <div class="col-3">
                      <div class="p-2 ">Metode Pembayaran : </div>
                    </div>
                    <div class="col-9">
                      <div class="p-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Tunai</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Transfer</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Kredit</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col-3">
                      <div class="p-4 ">Rincian : </div>
                    </div>
                    <div class="col-9">
                      <div class="p-1">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    Udang
                                </div>
                                <div class="col">
                                    Rp 80.000/Kg
                                </div>
                                <div class="col">
                                    Stock: 40 Kg
                                </div>
                                <div class="col">
                                    Beli : <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    Kepiting
                                </div>
                                <div class="col">
                                    Rp 160.000/Kg
                                </div>
                                <div class="col">
                                    Stock: 100 Kg
                                </div>
                                <div class="col">
                                    Beli : <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    Lobster
                                </div>
                                <div class="col">
                                    Rp 150.000/Kg
                                </div>
                                <div class="col">
                                    Stock: 65 Kg
                                </div>
                                <div class="col">
                                    Beli : <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <router-link to="/stockPenjual">
            <button type="button" class="btn btn-primary btn-submit5">
                Tambah Riwayat
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
    .btn-submit5{
        margin-left: 80%;
        margin-bottom: 2em;
        margin-top: 1em;
        padding-left: 1em;
        padding-right: 1em;
    }
</style>