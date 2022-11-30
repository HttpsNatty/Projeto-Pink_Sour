<template>
<div>
<img src="/img/pslogo.png" class="center">

<div class=quemsomos>
    Quem somos
</div>

<div class="carrossel">
    <div class="slides">
        <div class="numerotexto">1 / 3</div>
        <img src="/img/Cardapio/Pipoca de Torresmo.png" style="width:100%" class="responsive">
        <div class="texto">Pipoca de Torresmo</div>
    </div>
    <div class="slides">
        <div class="numerotexto">2 / 3</div>
        <img src="/img/Cardapio/Tiramisu.png" style="width:100%" class="responsive">
        <div class="texto">Tiramisu</div>
    </div>
    <div class="slides">
        <div class="numerotexto">3 / 3</div>
        <img src="/img/Cardapio/Pavê de Leite Ninho.png" style="width:100%" class="responsive">
        <div class="texto">Pavê de Leite Ninho</div>
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <!-- <script>
        let slideIndex = 1;
        let slideIndex2 = 0;
        showSlides(slideIndex);
        

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // function currentSlide(n) {
        //     showSlides(slideIndex = n);
        // }

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("slides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex2++;
            if (slideIndex2 > slides.length) {
                slideIndex2 = 1
            }
            slides[slideIndex2-1].style.display = "block";
            setTimeout(showSlides, 3000);
        }
    </script> -->
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
</div>
</template>