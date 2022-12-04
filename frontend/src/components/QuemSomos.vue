<template>
    <!-- Componente do Sobre -->
    <div class="home">
        <img src="/img/pslogo.png" class="logoprincipal">
        <div class=quemsomos>
            <h2>Quem somos</h2>
            <p>A ideia do bar surgiu atraves de uma conversa em um grupo de amigas, onde cada uma tinha um hobby relacionado a comida ou bebida.</p>
            <br>
            <p>Uma sommelier, uma salgadeira e uma confeiteira decidiram abrir uma casa onde todas elas pudessem servir suas artes feitas com carinho.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'QuemSomos'
}
</script>
<style>
    .quemsomos {
    background: #D34C59;
    color: #ffffff;
    height: auto;
    align-items: center;
    text-align: center;
}

.logoprincipal {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 250px;
}
</style>