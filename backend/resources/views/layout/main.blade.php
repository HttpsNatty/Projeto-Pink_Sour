<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    
    <!-- Fonte do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- CSS da aplicação -->
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script>
    
    <!-- Vue.js -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="src/app.js" defer></script>

    <?php
    date_default_timezone_set('America/Sao_Paulo');
    
    date_default_timezone_get();
    ?>

</head>
<body>
    <header>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="topnav" id="myTopnav">
            <a href="/"><img src="/favicon.ico" class="logo" alt="Pink Sour"></a>
            <a href="/">Inicio</a>
            <a href="/cardapio">Cardapio</a>
            <a href="/promocoes">Promoções</a>
            <!-- <a href="/">Contato</a> -->
            @auth
                <!-- if($cliente == !null) -->
                    <form action="/logout" class="navbar-sair" method="POST">
                        @csrf
                        <a href="/logout" class="split" onclick="event.preventDefault(); this.closest('form').submit();">Sair
                        </a>
                    </form>
                    <a href="/dashboard" class="split">USUARIO</a>
                    <img src="/img/Usuw.png" class="split" id="imagem-nav"alt="foto de usuario">
            @endauth
            @guest
                <a href="/entrar" class="split">Login</a>
                <a href="/cadastro" class="split">Cadastro</a>
            @endguest
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
            </a>
            
        <script language="javascript" type="text/javascript">
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                x.className = "topnav";
                }
            }
        </script></div>
    </header>
@if(session('msg'))
    <p class="msg">{{ session('msg') }}</p>
@endif

@if(session('error'))
    <p class="msg-error">{{ session('error') }}</p>
@endif
@yield('content')    
<footer>
    <center><p> Pink Sour &copy; 2022</p></center>
</footer>
<script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>