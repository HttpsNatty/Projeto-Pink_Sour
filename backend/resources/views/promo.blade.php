@extends('layout.main')

@section('title', 'Pink Sour | Promoções')

@section('content')
<center>
<div>
    <h1>Confira nossas promoções</h1>
    <div id="menuitens" class="row" >
        @foreach($promocoes as $promocoe)
        <div id="menucard" class="container">
            <div id="card-body">
                <div>
                    <h2>{{ $promocoe->nome }}</h2> <br>
                    <div>{{ $promocoe->descricao }}</div>
                </div>           
            </div>
        </div>
    @endforeach
</div>
</center>
@endsection