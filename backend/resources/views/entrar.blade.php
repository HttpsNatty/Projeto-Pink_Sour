@extends('layout.main')

@section('title', 'Pink Sour | Login')

@section('content')

@error('email')
{{ $message }}
@enderror

<center>
<div class="forms">
    <h1><img id="garrafa" width="260px" src="/img/pinks.png">Login<img id="garrafa" width="260px" src="/img/pinks.png"></h1>
    <br>
    <form class="login" method="POST" action="{{ route('entrar') }}">
        @csrf
        <div class="row">
        <div class="col-75">
            <input type="email" id="email" name="email"<?php if(!empty($erronome)){echo "class='invalido'";}?><?php if (isset($_POST['nome'])){echo "value='".$_POST['nome']."'";} ?> placeholder="Digite seu email"><br>
        </div></div>
        @if (Auth::check()) 
<p>esta autenticado</p>
@endif
        <div class="row">
        <div class="col-75">
            <input id="senha" name="senha" type="password" <?php if(!empty($errosenha)){echo "class='invalido'";}?><?php if (isset($_POST['senha'])){echo "value='".$_POST['senha']."'";} ?> placeholder="Digite sua senha">
            <img id="olho" onclick=mostraSenha() width="25px" src="/img/close.svg">
            <br>
        </div></div>
    <br>
        <div class="row">
        <p>
            <input class="btn btn-sour" type="submit" value="Login"/></p>
        </div>
        <div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                @endif
                </div>
            <p> Ainda não possui cadastro? <a href= "/cadastro">Cadastre-se</a><br>
            <a href= "/"> Voltar para página inicial</a>
        </div>
    </form>
</div>
</center>

<?php  

function checkpost($valor){
    $valor = trim($valor);
    $valor = stripslashes($valor);
    $valor = htmlspecialchars($valor);
    return $valor;
}?>


<script language="javascript" type="text/javascript">
    const olho = document.getElementById("olho")
    let senha = document.getElementById("senha")

    function mostraSenha(){
        if(senha.type=="password"){
            senha.type="text";
            olho.setAttribute("src", "/img/open.svg")
        }else{
            senha.type="password";
            olho.setAttribute("src", "/img/close.svg")
        }
    }
</script>
@endsection