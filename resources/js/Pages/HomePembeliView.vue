<template>
    <NavBar title="SITAMBANG"/>
    <div>
        <div class="white-box">
            <label>
                Selamat Datang
            </label>
        </div>
    </div>
</template>

<script>
import NavBar from '@/Components/NavBar.vue'

export default {
    data(){
        return{
            menu: false,
        }
    },
    components:{
        NavBar,
    },
    methods:{
        toggleMenu(){
            this.menu = !this.menu
        }
    }
}
</script>

<style scoped>
    .white-box{
        display: flex;
        padding: 20px;
        margin: 50px;
        border: 0px;
        border-radius: 5px;
        box-shadow: 2px 2px 4px 4px rgba(0, 0, 0, 25%);
    }
</style>