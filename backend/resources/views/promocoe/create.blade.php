@extends('layout.master')

@section('title', 'Pink Sour | Nova Promoção')

@section('content')

<div class="forms" id="promocoe">
    <h1>Criando nova promoção</h1>
    <!-- Formulário de Promoção -->
    <form name="promocoe" method="POST" action="{{route('promocao.criar')}}">
    @csrf
    <div> <!-- Campo Nome -->
        <label for="nome">Nome da Promoção:</label>
        <br>
        <input type="text" name="nome" placeholder="Nome">
    </div>
    <div> <!-- Campo Descrição -->
        <label for="descricao">Descrição da Promoção:</label>
        <br>
        <input type="text" name="descricao" placeholder="Descrição">
    </div>
    <br>
    <div> <!-- Botões -->
        <p><input class="btn btn-sour" type="submit" value="Criar"/></p>
        <p><input class="btn btn-sour" type="reset" value="Limpar"/></p>
    </div>
    </form>
</div>
    



@endsection