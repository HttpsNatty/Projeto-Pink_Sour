@extends('layout.master')

@section('title', 'Pink Sour | Editando: Promoção')

@section('content')

<div class="forms" id="promocoe">
    <h1>Editanto: {{ $promocoe->nome }} </h1>
    <!-- Formulário de edição -->
    <form action="/promocoes/update/{{ $promocoe->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group"> <!-- Campo Nome -->
        <label for="nome">Nome da Promoção:</label>
        <br>
        <input type="text" name="nome" value="{{ $promocoe->nome }}">
    </div>
    <div class="form-group"> <!-- Campo Descrição -->
        <label for="descricao">Descrição da Promoção:</label>
        <br>
        <input type="text" name="descricao" value="{{ $promocoe->descricao }}">
    </div>
    <br>
    <div> <!-- Botão -->
      <input type="submit" class="btn btn-sour" value="Editar Promocoe">
    </div>
    </form>
</div>

@endsection