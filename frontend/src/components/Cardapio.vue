<template>
    <div class="CardapioPesquisa">
        <div id="pesquisadiv" class="pesquisadiv">
            <h1>Busque um aperitivo ou uma cerveja</h1>
            <form action="/cardapio" method="GET">
                <input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Procurar...">
            </form>
        </div>
        <div>
        <h2 v-show="pesquisa">{{ textoPesquisa }}</h2>
    </div>

</template>

<script>
export default {
    name: 'Cardapio',
    props: ['pesquisa', 'produto'],
    data(){
        return {
            textoPesquisa: '',
            produtos: null
        }
    },

    methods: {
        async getProdutos(){
            const req = await fetch('http://127.0.0.1:8000/cardapio');
            const data = await req.json;
            console.log(data)
        },
        pesquisaShow(){
            if(pesquisa != ''){
                this.textoPesquisa = 'Teste'
                "Buscando por: {{ pesquisa }}"
            }
            else{
                this.textoPesquisa = 'confira'
                "Confira nosso menu completoo"
            }
        }
    },

    mounted () {
    this.getProdutos()
  } 
}
</script>