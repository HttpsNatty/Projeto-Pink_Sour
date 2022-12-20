<template>
    <div class="lista">
        <div class="content">
        <table class="table table striped my_table">
            <thead>
                <tr>
                <th>#</th>
                <th>Nome</th>
                <th>horas</th>
                <th>pessoas</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="reserva in reservas" :key="reserva.id">
                    <th>{{reserva.id}}</th>
                    <th>{{reserva.nome}}</th>
                    <th>{{reserva.horas}}</th>
                    <th>{{reserva.pessoas}}</th>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Lista",
    props: {
        reservas: Array
    }
}
</script>

<style>
.lista{
    width: 100%;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 3px;
    background-color: #fff;
}
</style>