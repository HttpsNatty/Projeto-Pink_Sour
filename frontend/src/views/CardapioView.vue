<template>
    <div>
        <div id="menuitens" class="row">
            <h2>alo</h2>
              <ul>
                <li v-for="(menu, index) in produtos" v-bind:key="index">{{ nome }}>
                {{ descricao }}
                </li>
                </ul>
            </div>
    </div>    
</template>

<script>
export default{
    name:'CardapioView',
    data() {
        return [
            'produtos'
        ]
    },
    methods: {
        // async getProdutos(){
        //     const req = await fetch('http://localhost:8000/');
        //     const data = await req.json;
        //     console.log(data)
        // }
    },
    mounted () {
    this.getProdutos()
  } 
}

</script>