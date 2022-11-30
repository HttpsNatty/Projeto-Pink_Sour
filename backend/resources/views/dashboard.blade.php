@extends('layout.main')

@section('title', 'Pink Sour | Clube')

@section('content')

<div class="home do painel">
    <h2>Bem-vindo ao Clube!</h2>
   
    <img src="/img/bohemia.png" alt="" width="150px">
    <br>
    <h3>Veja o que pode fazer agora!</h3><br>
    <div class=painelopcoes>
    <a href="/reserva" class="btn-sour">Fazer Reserva</a>
    <a href="promo" class="btn-sour">Cartela Fidelidade</a>
    </div>
</div>

<br>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h2>Minha cartela</h2>
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h2>Minhas reservas</h2>
    <br>
    <div class="col-md-10 offset-md-1 dashboard-reservas-container" style="overflow-x:auto;">
    
</div>

@endsection