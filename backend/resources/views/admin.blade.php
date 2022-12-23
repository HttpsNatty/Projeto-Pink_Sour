@extends('layout.master')

@section('title', 'Pink Sour | Área Secreta')

@section('content')

<div class="forms">
    <h1><img id="garrafa" width="260px" src="/img/pinks.png">Login<img id="garrafa" width="260px" src="/img/pinks.png"></h1>
    <br>
    <form class="login" method="POST" action="{{ route('admin') }}">
        @csrf
        <div class="row">
        <div class="col-75">
            <input type="email" id="email" name="email"placeholder="Digite seu email"><br>
        </div></div>
        @if (Auth::check()) 
<p>esta autenticado</p>
@endif
        <div class="row">
        <div class="col-75">
            <input id="senha" name="senha" type="password" placeholder="Digite sua senha">
            <img id="olho" onclick=mostraSenha() width="25px" src="/img/close.svg">
            <br>
        </div>
        </div>
        <br>
        <div class="row">
        <p>
            <input class="btn btn-sour" type="submit" value="Login Admin"/></p>
        </div>
    </form>
</div>
@endsection