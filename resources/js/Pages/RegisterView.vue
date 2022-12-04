<template>
    <PreNavBar />
    <div class="flex-box">
        <div class="box">
            <h2 class="title">Form Pendaftaran Pembeli</h2>
            <form class="forms" @submit.prevent="this.$router.push('/pembeli')">
                <div class="form-input">
                    <label>Nama</label>
                    <input type="text" v-model="nama">
                </div>
                <div class="form-input">
                    <label>Nomor Telepon</label>
                    <input type="tel" v-model="notelp">
                </div>
                <div class="form-input">
                    <label>Email</label>
                    <input type="email" v-model="email">
                </div>
                <div class="form-input">
                    <label>Password</label>
                    <input type="password" v-model="password">
                </div>
                <div class="form-input">
                    <label>Konfirmasi Password</label>
                    <input type="password" v-model="confirmpw">
                </div>
                <input type="submit" value="Daftar">
            </form>
        </div>
    </div>
</template>

<script>
import PreNavBar from '../components/PreNavBar.vue'

export default {
    data(){
        return{
            nama: '',
            notelp: '',
            email: '',
            password: '',
            confirmpw: '',
        }
    },
    components:{
        PreNavBar,
    },
    methods:{

    }
}
</script>

<style scoped>
.flex-box{
    background-color: #028aff;
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
    
   }

   .forms{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: column;
    align-content: center;
    width: 700px;
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
   }

   input[type="text"], input[type="password"],
   input[type="tel"], input[type="email"]{
    width: 70%;
    height: fit-content;
    border-radius: 5px;
    border: 1px solid black;
   }
</style>
