<template>
    <div class="contato">
        <h2>Fale conosco</h2>
        <img id="garrafa" width="160px" src="/img/pinks.png">
        <br>
        <div>
            <p>Venha nos conhecer!</p>
            <ul>
            <li v-for="(dados, index) in dados_Contato" v-bind:key="index">{{ dados }}</li>
            </ul>
        <ul>
            <li><img src="/img/facew.png">Pinksour </li>
            <li><img src="/img/instaw.png" alt="Instagram" width="50px"> @pinksour </li>

            <!-- <li v-for="(dados, index) in dados_Redes" v-bind:key="index">
                <img src="/img/{{ dados }}.png" width="500px">
                {{ dados }}
                </li> -->
        </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Contato',
    data() {
        return{
            dados_Contato: ['Telefone: (21) 2424-7070','E-mail: contato@pinksour.com', 'Endereço: Rua da Vinci, 1534']
        }
    }
}
</script>
<style>
.contato {
    background: bisque;
    height: auto;
    position: relative;
    margin: auto;
    width: auto;
    text-align: center;
    padding: 8px 12px;
    margin:auto;
} 
.contato li{
    font-size: 20px;
    list-style: none;
    flex: 50%;
}
.contato li img{
    width: 1%;
}
.contato img{
    width: 10%;
}
.row-coluna{
    display: flex;
}

@media screen and (max-width: 600px) {
    .coluna {
      width: 100%;
    }
}
</style>