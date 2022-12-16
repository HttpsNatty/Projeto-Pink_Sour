<template>
    <div class="forms">
    <h1><img id="garrafa" width="260px" src="/img/pinks.png">Login<img id="garrafa" width="260px" src="/img/pinks.png"></h1>
    <br>
    <form>
        <div class="row">
        <div class="col-75">
            <input type="email" id="email" name="email" placeholder="Digite seu email" v-model="formData.email" v-on:change="setCliente($cliente.target.value, cliente.id)">><br>
        </div></div>
        
        <div class="row">
        <div class="col-75">
            <input id="senha" name="senha" type="password" placeholder="Digite sua senha" v-model="formData.senha">
            <img id="olho" onclick=mostraSenha() width="25px" src="/img/close.svg">
            <br>
        </div></div>
    <br>
        <div class="row">
        <p>
            <input class="btn btn-sour" type="submit" @click="login"></p>
        </div>
        <div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900">
                    </a>
                </div>
        </div>
        </form>
    </div>
</template>

<script>

</script>