@extends('layout.main')

@section('title', 'Pink Sour | Editando: Clientes')

@section('content')
<div class="forms" id="cliente">
    <h1>Editanto: {{ $cliente->nome }} </h1>
    <!-- Formulário de edição -->
    <form action="/clientes/update/{{ $cliente->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div> <!-- Campo Nome -->
        <label for="nome">Nome do usuario:</label>
        <br>
        <input type="text" name="nome" value="{{ $cliente->nome }}">
    </div>
    <div> <!-- Campo Email -->
        <label for="email">Email do usuario:</label>
        <br>
        <input type="text" name="email" value="{{ $cliente->email }}">
    </div>
    <br>
    <div> <!-- Campo Data -->
        <label for="data">Data de nascimento:</label>
        <br>
        <input type="date" name="data" value="{{ date('Y/m/d', strtotime($cliente->data)) }}">
    <br>
    <div> <!-- Campo Senha -->
        <label for="descricao">senha:</label>
        <br>
        <input type="text" name="senha" value="{{ $cliente->senha }}">
    <br>
    <div> <!-- Botão -->
      <input type="submit" class="btn btn-sour" value="Editar Cliente">
    </div>
  </form>  
</div>
