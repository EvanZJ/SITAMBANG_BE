<template lang="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <NavbarPenjual title="Edit pembeli" :token="csrf"/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>
                        Edit pembeli
                    </h1>
                    <div>
                        <form method="POST" action="" class="forms">
                            <input type="hidden" name="_token" :value="csrf">
                            <div class="form-input">
                                <label class="title" for=" ">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" :value="pembeli.name" required>
                            </div>
                            <!-- <div class="form-input" v-if="pembeli.jenis_kelamin == 'Laki-laki'">
                                <label class="title"  for=" ">Jenis Kelamin</label>
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="Laki-Laki" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki - Laki
                                </label>
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="Perempuan">
                                <label class="form-check-label" for="flexRadioDefault2">
                                        Perempuan
                                </label>
                            </div>
                            <div class="form-input" v-else>
                                <label class="title"  for=" ">Jenis Kelamin</label>
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="Laki-Laki">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki - Laki
                                </label>
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="Perempuan" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                        Perempuan
                                </label>
                            </div> -->
                            <div class="form-input">
                                <label class="title" for=" ">No Telp</label>
                                <input type="text" name="no_hp" id="alamat" class="form-control" placeholder="Alamat" :value="pembeli.no_telp" required>
                            </div>
                            <div class="form-input">
                                <label class="title" for=" ">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" :value="pembeli.alamat" required>
                            </div>
                            <div class="form-input">
                                <label class="title" for=" ">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" :value="pembeli.email" required>
                            </div>
                            <input type="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import NavbarPenjual from '@/Components/NavBarPenjual.vue';
export default {
    components: {
        // Navbar,
        NavbarPenjual,
    },
    props: {    
        csrf: String,
        pembeli: Object,
    },
    mounted() {
        console.log(this.csrf);
    },
}
</script>
<style scoped>
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
    width: 100%;
    padding: 20px;
}
label{
    align-items: center;
}
.title{
    font-size: 20px;
    font-weight: bold;
    width: 50%;
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
</style>