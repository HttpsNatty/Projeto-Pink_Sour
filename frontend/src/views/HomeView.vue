<template>
  <div class="home">
    <QuemSomos />
    <Carrossel />
    <Comemorar />
    <Contato />
  </div>
</template>

<script>
import QuemSomos from '@/components/QuemSomos'
import Carrossel from '@/components/Carrossel'
import Comemorar from '@/components/Comemorar'
import Contato from '@/components/Contato'
export default {
  name: 'home',

  components: {
    QuemSomos,
    Carrossel,
    Comemorar,
    Contato
  }
}
</script>