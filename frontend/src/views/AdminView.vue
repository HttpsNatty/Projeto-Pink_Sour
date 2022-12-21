<template>
    <div>
        <div class="tabela">
        <Lista :clientes="clientes" />
        </div>
    </div>
</template>

<script>
import Lista from '@/components/Lista'
import axios from 'axios';

export default {
    name: 'AdminView',

    data() {
        return {
            reserva: [],
            teste: 'texto'
        }
    },

    mounted() {
        this.getReserva();
    },

    methods: {
        getReserva() {
            axios.get(`${process.env.VUE_APP_URL}teste`).then((response)=>{
                console.log(response.data);
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

<style>
    
</style>