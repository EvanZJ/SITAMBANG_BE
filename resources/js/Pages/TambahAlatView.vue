<template>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <NavBar title="Kondisi Peralatan" :token="token"/>
    <div class="flex-box">
        <div class="box">
            <h2 class="title">Tambah Peralatan</h2>
            <form class="forms" method="POST" action="/karyawan/alat/create">
            <input type="hidden" name="_token" :value="csrf">
                <div class="form-input">
                    <label>Nama Alat</label>
                    <input type="text" name="name" value="">
                </div>
                <div class="form-input">
                    <label>Penanggun Jawab Terakhir</label>
                    <!-- <input type="text" v-model="pj"> -->
                    <select name="karyawan_id" value="">
                        <option v-for="(karyawan, idx) in karyawans" 
                                :key="idx"
                                :value="karyawan.id">
                                {{ karyawan.name }}
                        </option>
                    </select>
                </div>
                <div class="form-input">
                    <label>Kondisi</label>
                    <!-- <input type="text" name="kondisi" value=""> -->
                    <select name="kondisi" value="">
                        <option v-for="(kondisi, idx) in kondisis" 
                                :key="idx"
                                :value="kondisi">
                                {{ kondisi }}
                        </option>
                    </select>
                </div>
                
                <input type="submit" value="Tambah">
            </form>
        </div>
    </div>
</template>

<script>
import NavBar from '@/Components/NavBarPenjual.vue'

export default {
    data(){
        return{
            kondisis : ['Sangat Baik', 'Baik', 'Normal', 'Kurang Baik', 'Buruk', 'Rusak', 'Hilang', 'Dipinjam']
        }
    },
    components:{
        NavBar,
    },
    methods:{

    },
    props : {
        csrf: String,
        karyawans: Array,
        token: String
    }
}
</script>

<style scoped>
.flex-box{
    background-color: #ffffff;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    align-content: center;
   }
   .box{
    background-color: white;
    width: fit-content;
    height: fit-content;
    border-radius: 10px;
    box-shadow: 0px 0px 8px;
    padding: 20px;
    display:flex;
    align-items: flex-start;
    justify-content: space-around;
    flex-direction: column;
    margin: 4.45%;
   }
   .form-input{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin: 10px;
    width: 100%;
    border: none;
   }

   .forms{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: column;
    align-content: center;
    width: 800px;
    padding: 20px;
   }

   input[type="submit"]{
    margin: 10px;
    align-self: center;
    background-color: #028aff;
    border-radius: 5px;
    border: 0px solid;
    padding: 7px;
    padding-right: 30px;
    padding-left: 30px;
    color: white;
    align-self: flex-end;
   }

   input[type="text"], input[type="password"],
   input[type="tel"], input[type="email"], select{
    width: 70%;
    height: fit-content;
    border-radius: 5px;
    border: 1px solid black;
   }
</style>
