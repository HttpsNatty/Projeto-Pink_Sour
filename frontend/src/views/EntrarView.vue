<template>
    <div class="forms">
    <h1><img id="garrafa" width="260px" src="/img/pinks.png">Login<img id="garrafa" width="260px" src="/img/pinks.png"></h1>
    <br>
    <form>
        <div>
            <input type="email" id="email" name="email" placeholder="Digite seu email" v-model="formData.email"><br>
        </div>
        <div>
            <input id="senha" name="senha" type="password" placeholder="Digite sua senha" v-model="formData.senha">
            <img id="olho" @click=mostraSenha() src="/img/close.svg">
            <br>
        </div>
        <br>
        <div class="row">
        <p>
            <input class="btn btn-sour" type="submit" @click="entrar"></p>
        </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Entrar',

    data(){
        return {
            formData:{}
        }
    },

    methods: {
        entrar() {
           axios.post(`${process.env.VUE_APP_URL}api/login`,this.formData).then((response)=>{
            localStorage.setItem('token',response.data.token)
            window.location.href = '/dashboard'
           })
           .catch((error)=>{
            console.log(error);
           })
        },
    }
}
</script>
<style>
#olho {
    width: 25px;
}
#garrafa {
    width: 160px;
}
</style>