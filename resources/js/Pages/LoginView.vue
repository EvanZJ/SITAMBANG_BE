<template>
    <PreNavBar />
    <div class="flex-box">
        <div class="box">
            <h2 class="title">Login</h2>
            <form class="forms" @submit.prevent="this.$router.push('/admin')">
                <div class="form-input">
                    <a>Email</a>
                    <br/>
                    <input type="text" v-model="email">
                </div>
                <div class="form-input">
                    <a>Password</a>
                    <br/>
                    <input type="password" v-model="password">
                </div>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</template>

<script>
import PreNavBar from '@/Components/PreNavBar.vue'

export default {
    data(){
        return{
            email: '',
            password: '',
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
    align-items: center;
    justify-content: space-around;
    flex-direction: column;
    margin: 13%;
   }
   .form-input{
    margin: 5px;
    width: 100%;
   }

   .forms{
    display: flex;
    align-items: center;
    justify-content: space-around;
    flex-direction: column;
    align-content: center;
    width: 300px;
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

   input[type="text"], input[type="password"]{
    width: 100%;
    border: 1px solid black;
    border-radius: 5px;
   }
</style>
