@extends('layouts.main')

@section('title', 'Minha Reserva')

@section('content')

<div>
    <h2>Minhas reservassss</h2>
    <div id="data">
    <label for="data">Data de Reserva:</label>
        <input type="date" name="data" value="{{ $reserva->data }}">
    </div>
    <br>
    <div id="horas">
        <label for="title">Horas:</label>
        <input name="horas" value="{{ $reserva->horas }}">
        <br>
    </div>
    <br>
    <div id="pessoas">
        <label for="title">Pessoas:</label>
        <input type="text" value="{{ $reserva->pessoas }}">
    </div>
    <br>
    <p><input class="btn btn-sour" type="submit" value="Reservar"/></p>
    <p><input class="btn btn-sour" type="reset" value="Limpar"/></p>



</div>

@endsection