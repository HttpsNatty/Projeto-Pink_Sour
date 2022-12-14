@extends('layout.main')

@section('title', 'Pink Sour | Cardapio')

@section('content')

<h2> Cardapio </h2>

<div id="pesquisadiv" class="pesquisadiv">
    <h1>Busque por aperitivo, cerveja ou sobremesa</h1>
    <form action="/cardapio" method="GET">
        <input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Procurar...">
    </form>
</div>

<div>
    @if($pesquisa != '')
    <h2>Buscando por: {{ $pesquisa }}</h2>
    @else
    <h2>Confira nosso menu completo</h2>
    @endif
    <div id="menuitens" class="row">
        @foreach($produtos as $produto)
        <div id="menucard" class="container">
            <img src="/img/Cardapio/{{ $produto->nome }}.png" alt="{{ $produto->nome }}" class="imagemCard">
            <div id="card-body" class="overlay">
                <div class="text">{{ $produto->descricao }}</div>           
            </div>
            {{ $produto->nome}}
        </div>
    </div>
    @endforeach
    @if(count($produtos) == 0 && $pesquisa)
            <h4>Não foi possível encontrar nenhum produto com {{ $pesquisa }}! <a href="/cardapio"><h4>Ver o menu completo</h4></a></h4>
        @elseif(count($produtos) == 0)
            <p>Não há itens disponíveis</p>
        @endif
</div>

@endsection