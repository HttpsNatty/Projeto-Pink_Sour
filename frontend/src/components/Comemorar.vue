<template>
    <div class=comemorar>
        <h2>Venha comemorar com a gente!</h2>
        <p>Aniversariante do mês? Venha com 10 convidados e a torta é por nossa conta!</p>
        <br>
        <p> Quer reservar a mesa e ainda ganhar uma mensagem de aniversário especial? Entre para o nosso clube agora mesmo!</p>
        <br>
        <div>
            <h2><router-link class="btn btn-white" to="/cadastro">Cadastre-se</router-link></h2>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Comemorar'
}
</script>

<style>
.comemorar {
    background: #D34C59;
    color: #ffffff;
    min-height: 300px;
    text-align: center;
    position: relative;
    margin: auto;
    width: auto;
    text-align: center;
    padding: 8px 12px;
}
</style>