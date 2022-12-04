<template lang="">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <NavBar title="Informasi Barang"/>
    <div class="container">
        <div class="isi-item" v-for="(stock, idx) in stocks" :key="idx">
            <div class="d-flex row">
                <h1 class="">
                    {{ idx+1 }}. {{ stock.name }}
                </h1>
            </div>
            <div class="d-flex row detail-item justify-content-between">
                <div class="d-flex fix">
                    <div class="row">
                        <div class="col">
                            {{ stock.description }}
                        </div>
                        <div class="col">
                            <a :href="'/stock/edit/'+stock.id" class="row button-isi btn btn-primary">
                                Edit Stock
                            </a>
                            <form method="POST" :action="'/stock/delete/'+stock.id">
                                <input type="hidden" name="_token" :value="csrf">
                                <button type="submit" class="row button-isi btn btn-primary">Delete Stock</button>
                            </form>
                            <div class="row button-isi">
                                Jumlah Barang Tersedia
                            </div>
                            <div class="row button-isi detil">
                                {{ stock.total_persediaan }} Kg
                            </div>
                            <div class="row button-isi detil">
                                {{ toCurrency(stock.harga) }}/Kg
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="tempat-button">
                <a href="/stock/create" type="button" class="btn btn-primary">Tambah Produk</a>
            </div>
        <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae dignissimos, repellendus maiores enim nam ut nesciunt odit maxime quaerat totam recusandae cum delectus voluptate exercitationem ipsa assumenda doloribus dolor labore? Vel facilis, itaque voluptas accusamus tenetur asperiores reiciendis assumenda! Voluptatum, quis? Est tempora, earum modi ut placeat iusto corrupti odit sint dolores maxime ducimus impedit incidunt ratione facilis rerum vitae repellendus officia neque dolorem cumque quia quis nobis nihil? Soluta doloribus blanditiis consequuntur vitae saepe quibusdam sit iure, ab maxime distinctio suscipit at delectus, totam illo nulla eos amet, tempora doloremque unde commodi accusamus cum. Eius animi accusantium maxime ipsum alias eaque quis cum est deserunt! Laboriosam sapiente aspernatur rerum reiciendis quia necessitatibus fugit. Necessitatibus dolore dicta consectetur? Ullam fugit eaque adipisci odio nesciunt pariatur repudiandae fuga, provident quas quos similique corporis accusantium eum aspernatur dolor illum molestias blanditiis sint quia amet! Explicabo eum totam fugit esse consectetur non tempore enim minima accusantium. Sint delectus iste architecto a consectetur, ex reprehenderit facere itaque aut? Et ex velit in vel perspiciatis placeat iure ipsam ipsa distinctio eius laborum sequi harum doloribus quia architecto accusantium cumque, aliquam laboriosam consequatur veritatis saepe rem aliquid perferendis illo! Exercitationem architecto harum quisquam repellat, aliquid labore temporibus eveniet cum, alias placeat accusamus quae quos debitis distinctio minima dolorum eius et, nihil numquam laudantium delectus repellendus eligendi reiciendis illo. Velit provident doloribus eius distinctio nihil consectetur cupiditate ipsa maiores rem eaque laborum perferendis iusto tempora pariatur sapiente excepturi officia odit, dolorum itaque perspiciatis fugit nulla voluptatibus autem suscipit. Nostrum ullam quo, praesentium quos fuga quasi sapiente laboriosam? Nemo ullam itaque libero, quam repudiandae molestiae esse? Sequi nesciunt dicta omnis maxime, debitis rem impedit accusamus sapiente facere voluptatem harum magni laboriosam quasi deleniti repellendus velit obcaecati sint possimus saepe assumenda distinctio. Ab libero delectus nam nesciunt doloremque sint dignissimos quam ex. Aliquam rerum natus harum at ut aspernatur commodi animi, debitis labore repellat quidem corporis aperiam adipisci, quod praesentium optio aut laboriosam, cupiditate itaque exercitationem minima sunt. Dignissimos commodi cum voluptate voluptates eius autem illo nisi error maxime quo enim reiciendis fugit ea sapiente numquam provident, minima recusandae excepturi modi harum aspernatur vel corporis quae. Iusto aspernatur earum libero nihil, ut rem, numquam eaque delectus sunt enim ratione rerum accusamus? Harum est aliquam dolor dicta consequatur ab atque consectetur, quasi quo nesciunt veritatis labore perferendis iure nostrum iusto alias ea beatae voluptates dolore eligendi assumenda maiores et a odio! Eius, iusto, veritatis illo commodi suscipit magnam sit quasi cum culpa obcaecati veniam quidem vel exercitationem libero est tempore nam animi incidunt! Recusandae corporis distinctio hic beatae sunt, sapiente pariatur obcaecati optio? Dignissimos sint consequuntur aspernatur? Repudiandae iure culpa quisquam molestiae dignissimos repellat! Corporis, deleniti temporibus. Amet, sint voluptas culpa esse iusto nostrum, laborum ex nemo sequi ducimus minima. Temporibus molestiae sint modi in tempora, dolore corporis reprehenderit adipisci? Possimus quisquam numquam qui aliquam nobis laboriosam adipisci esse minima blanditiis? Quo similique consequatur odit, dignissimos iste sint? Beatae distinctio ad eius sequi magni molestiae atque voluptate repellat soluta maiores. -->
    </div>
</template>
<script>
import NavBar from '../components/NavBarPenjual.vue'
export default {
    components:{
        NavBar
    },
    props:[
        'stocks', 'csrf',
    ],
    methods:{
        toCurrency(value) {
        if (typeof value !== "number") {
            return value;
        }
        var formatter = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" });
        return formatter.format(value)
    },
    }
}
</script>
<style lang="css">
    .container{
        box-shadow: 0 0 10px #888888;
        width: 100%;
        margin-top: 2em;
        margin-left: 2em;
        margin-right: 2em;
        border-radius: 15px;
    }
    .title-jual{
        width: 100%;
    }
    .isi-item{
        padding-left: .25em;
        padding-top: .5em;
        padding-right: .25em;
    }
    .detail-item{
        width: 100%;
        border: 1.5px solid black;
        margin-left: .25em;
        margin-top: .3em;
        margin-bottom: 1em;
        margin-right: .25em;
        border-radius: 15px;
        padding-left: .25em;
        padding-top: .3em;
        padding-bottom: 1em;
        padding-right: .25em;
    }
    .button-isi{
        padding-left: 75%;
        padding-top: 2%;
        padding-bottom: 2%;
        margin: 5px;
    }
    .detil{
        font-size: 20px;
    }
    .tempat-button{
        width: 100%;
        margin-bottom: 1em;
        padding-left: 80%;
        padding-bottom: 2em;
    }
    .router-link{
        text-decoration: none;
    }
</style>