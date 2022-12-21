<template>
    <div>
        <div class="forms">
            <h1><img id="garrafa" src="/img/black.png">Cadastre-se<img id="garrafa" src="/img/black.png"></h1>
            <div class="row-coluna">
                <div class="coluna">
                <!--Formulario de Cadastro-->
                <form>
            <div> <!--Campo Nome-->
                <label> Digite seu nome:</label>
                <br>
                <input type="text" name="nome" id="nome" placeholder="Nome" v-model="formData.nome">
            </div>
            <div> <!--Campo Email-->
                <label>Digite seu e-mail:</label>
                <br>
                <input type="email" name="email" id="email" placeholder="Email" v-model="formData.email">
            </div>
            <div> <!--Campo Data-->
                <label>Digite a data do seu aniversário:</label>
                <br>
                <input type="date" name="data" id="data" v-model="formData.data">
            </div>
            <div class=".container-senha"> <!--Campo Senha-->
            <label for="senha">Senha:</label>
            <br>
            <input type="password" name="senha" id="senha" placeholder="Senha" v-model="formData.senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
            <img id="olho" @click=mostraSenha src="/img/close.svg"><br>
                <label>Confirmação senha:</label><br>
                <input type="password" id="repsenha" name="repsenha" placeholder="Repetir senha">
            </div>
            <div> <!--Area dos termos -->
        </div>
        <button type="button" class="btn btn-sour" @click="cadastroCliente">Cadastrar</button>
    </form>
            </div></div>

            <div><p>Já possui cadastro? <a href="/entrar">Entre</a></p>
    </div>
    </div></div>
</template>


<script>
const olho = document.getElementById("olho")
let senha = document.getElementById("senha")
let repsenha = document.getElementById("repsenha")
import axios from "axios";

export default {
    name: 'Cadastro',
    
    data(){
        return {
            formData:{},
            message:''
        }
    },
    methods: {
        mostraSenha(){
            const olho = document.getElementById("olho")
            let senha = document.getElementById("senha")
            let repsenha = document.getElementById("repsenha")
        if(senha.type=="password"){
            senha.type="text";
            repsenha.type="text";
            olho.setAttribute("src", "/img/open.svg")
        }else{
            senha.type="password";
            repsenha.type="password";
            olho.setAttribute("src", "/img/close.svg")
        }},
      

        cadastroCliente() {       
           axios.post(`${process.env.VUE_APP_URL}api/cadastro`,this.formData).then((response)=>{
            localStorage.setItem('token',response.data.token)
            window.location.href = '/entrar'
           })
           .catch((error)=>{
            console.log(error);
           })
        }
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