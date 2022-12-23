@extends('layout.master')

@section('title', 'Pink Sour | Nova Promocao')

@section('content')

<div class="forms" id="promocao">
    <h1>Criando nova Promoção</h1>
    <!-- Formulário de Promoção -->
    <form name="promocao" method="POST" action="{{route('promo.store')}}">
    @csrf
    <div> <!-- Campo Nome -->
        <label for="nome">Nome da Reserva:</label>
        <input type="text" name="nome" placeholder="Nome">
    </div>
    <div> <!-- Campo Descrição -->
        <label for="descricao">Descrição da Reserva:</label>
        <input type="text" name="descricao" placeholder="Descrição">
    </div>
    <br>
    <div> <!-- Botões -->
        <p><input class="btn btn-sour" type="submit" value="Criar Promoção"/></p>
        <p><input class="btn btn-sour" type="reset" value="Limpar"/></p>
    </div>
    </form>
</div>