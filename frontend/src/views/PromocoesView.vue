<template>
    <div>
        <h1 class="promo">Confira nossas promoções</h1>
        <div id="promoitens" class="row" >
            <div v-for="promocoe in promocoes" :key="promocoe.id">
                <br>
                <h2>{{ promocoe.nome }}</h2>
                <br>
                <h3>{{ promocoe.descricao }}</h3>
                <br>
                <img id="garrafa" width="1600px" src="/img/pinks.png">
                <img id="garrafa" width="160px" src="/img/pinks.png">
                <img id="garrafa" width="160px" src="/img/pinks.png">
                <br>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

var titulo = document.querySelector(".titulo");
titulo.textContent = "Pink Sour | Promocoes";

export default{
    name: 'PromocoesView',

    data() {
        return {
            promocoes: Array,
            promocoe_id: null
        }
    },

    methods: {
        getPromocoes() {
            axios.get(`${process.env.VUE_APP_URL}api/promocoes`).then((response)=>{
                this.promocoes = response.data;
                console.log(response.data);
            }).catch((error)=>{
               console.log(error);
            })
        }
    },

    mounted() {
        this.getPromocoes();
    }
}
</script>
<style>
.promo {
    background: bisque;
}
.promoitens {
    padding: 8px 12px;
    background: white;

}
img{
    width: 10%;
}
</style>