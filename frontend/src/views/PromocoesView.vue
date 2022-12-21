<template>
    <div>
        <div class="tabela">
        <Lista v-bind:promocoes="promocoes" />
        </div>
    </div>
</template>

<script>
import Lista from '@/components/Lista'
import axios from 'axios';

export default{
    name: 'PromocoesView',

    data() {
        return {
            promocoes: []
        }
    },

    mounted() {
        this.getPromocoes();
    },

    methods: {
        getPromocoes() {
            axios.get(`${process.env.VUE_APP_URL}api/promocoes`).then((response)=>{
                this.promocoes = response.data.promocoes;
            }).catch((error)=>{
               console.log(error);
            })
        }
    },

    components: {
        Lista
    }
}
</script>