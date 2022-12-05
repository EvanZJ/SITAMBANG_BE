<script setup>
import NavBar from '../../components/NavBar.vue'
</script>

<template>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<NavBar title="Pilih Cara Pembayaran"/>
<div id="undernav">
    <div id="window" class="mt-3 mb-3 mx-3 border border-bg-gray rounded">
        <div id="title" class="text-black m-3">
            <h2>Pemesanan</h2>
        </div>

        <div id="detail-transaksi" class="text-black m-5">
            <div id="table-detail">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga/Kg</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody v-for="data in data_pembelian">
                        <tr>
                        <th scope="row">{{ data.stock.name }}</th>
                        <td>{{ toCurrency(data.stock.harga) }}</td>
                        <td>{{ data.total_pembelian }}</td>
                        <td>{{ toCurrency(data.total_pembelian * data.stock.harga) }}</td>
                        </tr>
                    </tbody>
                </table>
                <div id="total-biaya">
                    <p>Total: {{ toCurrency(total_harga) }}</p>
                </div>
            </div>
            <div id="bullet list">
                <form action="/pembeli/proses-pilih-pembayaran" method="POST">
                    <input type="hidden" name="_token" :value="token">
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="caraPembayaran" id="flexRadioDefault1" value="Tunai">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Tunai
                        </label>
                    </div>
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="caraPembayaran" id="flexRadioDefault2"  value="Transfer Bank">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Transfer Bank
                        </label>
                    </div>
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="caraPembayaran" id="flexRadioDefault3"  value="e-Wallet">
                        <label class="form-check-label" for="flexRadioDefault3">
                            e-Wallet
                        </label>
                    </div>
                    <div id="submitpart">
                        <a href="/pembeli/pemesanan" class="btn btn-danger px-4">Back</a>
                        <input style="cursor:pointer" type="submit" class="btn btn-primary px-4 flex-end" id="submit" value="Next">
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
        'data_pembelian',
        'total_harga',
        'token',
    ],
    methods: {
        toCurrency(value) {
            if (typeof value !== "number") {
                return value;
            }
            var formatter = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" });
            return formatter.format(value);
        },
    },
}
</script>

<style scoped>
#bulletlist{
    width: 100%;
}
#submitpart{
    /* width: 500px; */
    margin-top: 10px;
    display: flex;
    justify-content: space-between;
}
</style>