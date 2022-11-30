@extends('layout.main')

@section('title', 'Pink Sour')

@section('content')

<center>
<img src="/img/pslogo.png" class="center">

<div class=quemsomos>
    <h2>Quem somos</h2>
    <p>A ideia do bar surgiu atraves de uma conversa em um grupo de amigas, onde cada uma tinha um hobby relacionado a comida ou bebida.</p>
    <br>
    <p>Uma sommelier, uma salgadeira e uma confeiteira decidiram abrir uma casa onde todas elas pudessem servir suas artes feitas com carinho.
    </p>
</div>

<div class="cardapio">
    <h2>Confira nossas especialidades</h2>
    <div class="carrossel">
        <div class="slides">
            <div class="numerotexto">1 / 3</div>
            <img src="/img/Cardapio/Pipoca de Torresmo.png" style="width:100%" class="responsive">
        </div>
        <div class="slides">
            <div class="numerotexto">2 / 3</div>
            <img src="/img/Cardapio/Tiramisu.png" style="width:100%" class="responsive">
        </div>
        <div class="slides">
            <div class="numerotexto">3 / 3</div>
            <img src="/img/Cardapio/Água Mineral com gás com rodelas de frutas.png" style="width:100%" class="responsive">
        </div>
    <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a> -->

        <script>
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
        </script>
    </div>
    <br>
    <div>
        <h2><a class="btn btn-sour" href="/cardapio">Confira nosso menu completo</a></h2>
        <br>
    </div>
</div>

<div class="comemorar">
    <h2>Venha comemorar com a gente!</h2>
    <p>Aniversariante do mês? Venha com 10 convidados e a torta é por nossa conta!</p>
    <br>
    <p> Quer reservar a mesa e ainda ganhar uma mensagem de aniversário especial? Entre para o nosso clube agora mesmo!</p>
    
    <a class="btn btn-white" href="/cadastro">Cadastre-se</a>
</div>
<div class="contato">
    <h2>Fale conosco</h2>
    <img id="garrafa" width="60px" src="/img/pinks.png">
    <br>
    <ul>Venha nos conhecer!
        <li>Telefone: (21) XXXX-XXXX</li>
        <li>E-mail: contato@pinksour.com</li>
        <li>Endereço: Rua da Vinci, 1534</li>
    </ul>
    <ul>
        <li><img src="/img/facew.png" alt="Facebook" width="20px"> Pinksour </li>
        <li><img src="/img/instaw.png" alt="Instagram" width="20px"> @pinksour </li>
    </ul>
</div>


</center>
@endsection