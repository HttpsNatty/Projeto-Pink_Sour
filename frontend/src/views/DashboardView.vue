<template>
    <div>
        <div class="tabela">
        <Lista :clientes="clientes" />
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'DashboardView',

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
            axios.get(`${process.env.VUE_APP_URL}api/teste`).then((response)=>{
                console.log(response.data);
            }).catch((error)=>{
               console.log(error);
            })
        }
    },
}
</script>

<style>
    
</style>