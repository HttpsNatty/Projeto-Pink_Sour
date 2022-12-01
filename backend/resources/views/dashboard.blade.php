@extends('layout.main')

@section('title', 'Pink Sour | Clube')

@section('content')
<center>
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
    <h2>Minhas reservas</h2>
    <br>
    <div class="col-md-10 offset-md-1 dashboard-reservas-container" style="overflow-x:auto;">
    @if(count($reservas) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Horas</th>
                    <th scope="col">Pessoas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/dashboard/{{ $reserva->id }}">{{ $reserva->data }}</a></td>
                        <td>0</td>
                        <td><a href="#">Editar</a>
                        <form action="/dashboard/{{ $reserva->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    @else
        <p>Você ainda não fez uma reserva, <a href="/reserva">Faça sua reserva</a></p>
    @endif
</div>
</center>
@endsection