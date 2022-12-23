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

    <?php
    date_default_timezone_set('America/Sao_Paulo');
    
    date_default_timezone_get();
    ?>

</head>
<body>
    <header>
        Administrador
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
<!-- <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> -->
</body>
</html>