@extends('layouts.main')

@section('title', 'Editando: Reserva' . $reserva->id)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Editando: {{ $reserva->nome }}</h1>
  <form action="/reserva/atualizar/{{ $reserva->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="date">Data da Reserva:</label>
      <input type="date" class="form-control" id="date" name="date" value="{{ $reserva->data->format('Y-m-d') }}">
    </div>
    <div class="form-group">
      <label for="title">:Horas da Reserva:</label>
      <select name="horas">
        <option value="17"{{ $reserva->horas == 17 ? "selected='selected'" : "" }}>17:00</option>
        <option value="18"{{ $reserva->horas == 18 ? "selected='selected'" : "" }}>18:00</option>
        <option value="19"{{ $reserva->horas == 19 ? "selected='selected'" : "" }}>19:00</option>
        <option value="20"{{ $reserva->horas == 20 ? "selected='selected'" : "" }}>20:00</option>
        <option value="21"{{ $reserva->horas == 21 ? "selected='selected'" : "" }}>21:00</option>
        <option value="22"{{ $reserva->horas == 22 ? "selected='selected'" : "" }}>22:00</option>
        </select>
    </div>
    <div class="form-group">
      <label for="title">Pessoas para a Reserva:</label>
      <select name="pessoas">
        <option value="1" {{ $reserva->pessoas == 1 ? "selected='selected'" : "" }}>1</option>
        <option value="2"{{ $reserva->pessoas == 2 ? "selected='selected'" : "" }}>2</option>
        <option value="3"{{ $reserva->pessoas == 3 ? "selected='selected'" : "" }}>3</option>
        <option value="4"{{ $reserva->pessoas == 4 ? "selected='selected'" : "" }}>4</option>
        <option value="5"{{ $reserva->pessoas == 5 ? "selected='selected'" : "" }}>5</option>
        <option value="6"{{ $reserva->pessoas == 6 ? "selected='selected'" : "" }}>6</option>
        <option value="7"{{ $reserva->pessoas == 7 ? "selected='selected'" : "" }}>7</option>
        <option value="8"{{ $reserva->pessoas == 8 ? "selected='selected'" : "" }}>8</option>
        <option value="9"{{ $reserva->pessoas == 9 ? "selected='selected'" : "" }}>9</option>
        <option value="10"{{ $reserva->pessoas == 10 ? "selected='selected'" : "" }}>10</option>
        <option value="11"{{ $reserva->pessoas == 11 ? "selected='selected'" : "" }}>11</option>
        <option value="12"{{ $reserva->pessoas == 12 ? "selected='selected'" : "" }}>12</option>
        <option value="13"{{ $reserva->pessoas == 13 ? "selected='selected'" : "" }}>13</option>
        <option value="14"{{ $reserva->pessoas == 14 ? "selected='selected'" : "" }}>14</option>
        <option value="15"{{ $reserva->pessoas == 15 ? "selected='selected'" : "" }}>15</option>
        <option value="16"{{ $reserva->pessoas == 16 ? "selected='selected'" : "" }}>16</option>
        <option value="17"{{ $reserva->pessoas == 17 ? "selected='selected'" : "" }}>17</option>
        <option value="18"{{ $reserva->pessoas == 18 ? "selected='selected'" : "" }}>18</option>
        <option value="19"{{ $reserva->pessoas == 19 ? "selected='selected'" : "" }}>19</option>
        <option value="20"{{ $reserva->pessoas == 20 ? "selected='selected'" : "" }}>20</option>
        <option value="21"{{ $reserva->pessoas == 21 ? "selected='selected'" : "" }}>21</option>
        <option value="22"{{ $reserva->pessoas == 22 ? "selected='selected'" : "" }}>22</option>
        <option value="23"{{ $reserva->pessoas == 23 ? "selected='selected'" : "" }}>23</option>
        <option value="24"{{ $reserva->pessoas == 24 ? "selected='selected'" : "" }}>24</option>
        <option value="25"{{ $reserva->pessoas == 25 ? "selected='selected'" : "" }}>25</option>
        <option value="26"{{ $reserva->pessoas == 26 ? "selected='selected'" : "" }}>26</option>
        <option value="27"{{ $reserva->pessoas == 27 ? "selected='selected'" : "" }}>27</option>
        <option value="28"{{ $reserva->pessoas == 28 ? "selected='selected'" : "" }}>28</option>
        <option value="29"{{ $reserva->pessoas == 29 ? "selected='selected'" : "" }}>29</option>
        <option value="30"{{ $reserva->pessoas == 30 ? "selected='selected'" : "" }}>30</option> 
        </select>
    </div>
  </form>  
</div>

@endsection