@extends('layout.master')

@section('title', 'Editando: Promocão' . $promocoe->id)

@section('content')

<div id="event-create-container" class="forms"> <!-- Formulário de edição -->
  <h1>Editando: {{ $promocoe->nome }}</h1>
  <form action="/promocoe/update/{{ $promocoe->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group"> <!-- Campo Nome -->
        <label for="nome">Nome da Promoção:</label>
        <input type="text" name="nome" value="{{ $promocoe->nome }}">
    </div>
    <br>
    <div class="form-group"> <!-- Campo Descrição -->
        <label for="descricao">Descrição da Promoção:</label>
        <input type="text" name="descricao" value="{{ $promocoe->descricao }}">
    </div>
    <div> <!-- Botão -->
      <input type="submit" class="btn btn-sour" value="Editar Promoção">
    </div>
  </form>  
</div>

@endsection