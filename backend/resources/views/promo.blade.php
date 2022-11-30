@extends('layout.main')

@section('title', 'Pink Sour | Promoções')

@section('content')

<h1> Promoções </h1>


<h2>Quinta Dose Dupla</h2>
Venha conferir a dose dupla a noite toda


<h2>Aniversariante</h2>
Venha com 10 convidados e a torta é por nossa conta!
@auth
<a href="/reserva">Faça sua reserva</a>

@endauth
@auth
<h2>Confira a sua Cartela Fidelidade</h2>
@endauth
@guest
<h2>Cartela Fidelidade</h2>
Faça seu cadastro ou login para ter acesso a essa vantagem!

@endguest




@endsection