<template>
    <div>
        <div v-if="error.validate" class="error"><h2>{{error.message}}</h2></div>
        <h1><img id="garrafa" width="160px" src="/img/black.png">Cadastre-se<img id="garrafa" width="160px" src="/img/black.png"></h1>
        <form>
        <input type="text" name="nome" id="nome" placeholder="Digite o nome do usuário" v-model="formData.name">
        <input type="email" name="email" id="email" placeholder="Digite o email do usuário" v-model="formData.email">
        <input type="date" name="datanasc" id="data" v-model="formData.name">
        <input type="password" name="senha" id="senha" placeholder="Senha" v-model="formData.senha">
        <input type="password" name="repsenha" id="repsenha" placeholder="Repetir senha">
        <button type="button" @click="registerUser">&lt; Cadastrar /&gt;</button>
    </form>
    </div>
</template>


<script>
import axios from "axios";
const api = axios.create({
 baseURL: "http://localhost:8080/api/",
});
export default {
    name: 'Cadastro',
    
    data(){
        return {
            formData:{},
            error: {
                validate:false,
                message:'',
            }
        }
    },
    methods: {
        registerUser() {
           axios.post(`${process.env.VUE_APP_URL}api/register`,this.formData).then((response)=>{
            this.error.validate = false
            window.location.href = '/login'
           })
           .catch((error)=>{
            this.error.validate = true
            this.error.message = error.response.data.message
           })
        }
    }
}
</script>