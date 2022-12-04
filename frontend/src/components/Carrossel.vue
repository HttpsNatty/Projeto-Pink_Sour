<template>
  <!-- Componente do Carrossel -->
  <div class="carrossel">
    <h2>Confira nossas especialidades</h2>
    <!-- Efeito de transição -->
    <transition-group class="slides" name="fade" tag="div">
    <div v-for="i in [currentIndex]" :key="i">
      <img class="responsive" style="width:100%" :src="currentImg" />
    </div>
    </transition-group>
    <br>
    <!-- Botão para o Cardapio -->
    <div>
      <h2><router-link class="btn btn-sour" to="/cardapio">Confira nosso menu completo</router-link></h2>
    <br>
    </div>
  </div>
</template>
// Chamando a função para passar o Carrossel sozinho
function showSlides();
<script>
export default {
    name: 'Carrossel',
 
    data() {
    return {
      images: [
        "/img/Cardapio/Água Mineral com gás com rodelas de frutas.png", "/img/Cardapio/Pipoca de Torresmo.png", "/img/Cardapio/Tiramisu.png"
      ],
      timer: null,
      currentIndex: 0
    };
  },
  mounted: function() {
    this.showSlide();
  },
  methods: {
    showSlide: function() {
      this.timer = setInterval(this.next, 6000);
    },
    next: function() {
      this.currentIndex += 1;
    },
    prev: function() {
      this.currentIndex -= 1;
    }
  },
  computed: {
    currentImg: function() {
      return this.images[Math.abs(this.currentIndex) % this.images.length];
    }
  }
}
</script>

<style>
* {box-sizing:border-box}

/* Carrossel */
.carrossel {
  background: bisque;
  height: auto;
  position: relative;
  margin: auto;
  width: auto;
  text-align: center;
  padding: 8px 12px;
}
.slides img{
    width: auto;
    height: 570px;
    object-fit: cover;
}

.responsive {
    width: 100%;
    height: auto;
}
</style>