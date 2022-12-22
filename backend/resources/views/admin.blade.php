@extends('layout.master')

@section('title', 'Pink Sour | Administrador')

@section('content')

<div class="forms">
    <h1><img id="garrafa" width="260px" src="/img/pinks.png">Login<img id="garrafa" width="260px" src="/img/pinks.png"></h1>
    <br>
    <form class="login" method="POST" action="{{ route('administrar') }}">
        @csrf
        <div class="row">
        <div class="col-75">
            <input type="email" id="email" name="email" placeholder="Digite seu email"><br>
        <div class="row">
        <div class="col-75">
            <input id="senha" name="senha" type="password"  placeholder="Digite sua senha">
            <br>
        </div></div>
    <br>
        <div class="row">
        <p>
            <input class="btn btn-sour" type="submit" value="Login"/></p>
        </div>
</form>

</div>
@endsection