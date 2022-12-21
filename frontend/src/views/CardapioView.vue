<template>
    <div>
        
        <h2>Confira nosso menu completo</h2>
        <br>
        <div id="menuitens" class="row">
            <br>
            <div v-for="produto in produtos" :key="produto.id">
                <div id="menucard" class="container">
                    <img src="/img/Cardapio/tiramisu.png" class="imagemCard">                   
                    <div id="card-body" class="overlay">
                        <div class="text">{{ produto.descricao }}
                        </div>
                    </div>
                </div>
                {{ produto.nome }}
            </div>    
        </div>
    </div>    
</template>

<script>
import axios from 'axios';
// import Buscador from '@/components/Buscador.vue';

export default{
    name:'CardapioView',

    data() {
        return {
            produtos: Array,
            produtos_id: null
        }
    },
    methods: {
        getProdutos(){
            axios.get(`${process.env.VUE_APP_URL}api/cardapio`).then((response)=>{
                this.produtos = response.data;
                console.log(response.data);
            }).catch((error)=>{
               console.log(error);
            })
        }
    },
    mounted () {
    this.getProdutos();
  },
//   components: {
//     Buscador
//   }
}

</script>
<style scoped>
/* Carpadio */
#menudiv
{
    padding: 50px;
}
  
#menudiv h2 {
    margin-bottom: 10px;
}
  
#menudiv .subtitle {
    color: #757575;
    margin-bottom: 30px;
}
  
#menuitens {
    display: flex;
}
  
#menudiv .card {
    flex: 1 1 0;
    max-width: 25%;
    border-radius: 10px;
    padding: 0;
    margin: 5px;
}
  
#menudiv img {
    max-height: 150px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

/* Cardapio */
.itens{
    position: relative;
    width: 50%;
}
.itens img{
    display: block;
    width: 100%;
    height: auto;
}
.container {
    position: relative;
    width: 50%;
    max-width: 300px;
}
.overlay {
    position: absolute;
    bottom: 0;
    background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.5); /* Black see-through */
    color: #f1f1f1;
    width: 200px;
    transition: .5s ease;
    opacity:0;
    color: white;
    font-size: 20px;
    padding: 20px;
    text-align: center;
}
 
.imagemCard {
    width: 200px;
    height: 300px;
    object-fit: cover;
  }

/* When you mouse over the container, the overlay text will "zoom" in display */
.container:hover .overlay {
    opacity: 1;
}
  
/* Some text inside the overlay, which is positioned in the middle vertically and horizontally */
.text {
    color: white;
    font-size: 20px;
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* text-align: center; */
}
</style>