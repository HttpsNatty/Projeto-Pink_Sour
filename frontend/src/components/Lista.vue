<template>
    <div class="lista">
        <div class="content">
            <div v-for="promocoe in promocoes" :key="promocoe.id">
                    <div>{{promocoe.id}}</div>
                    <div>{{promocoe.nome}}</div>
            </div>
            
        
        </div>
    </div>
</template>

<script>
export default {
    name: "Lista",
    props: {
        promocoes: null
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