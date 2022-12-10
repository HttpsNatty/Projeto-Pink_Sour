@extends('layout.main')

@section('title', 'Pink Sour | Reserva')

@section('content')
<center>
<div class="forms" id="reserva">
    <h1>Faça sua reserva</h1>
    <form name="reserva" method="POST">
    @csrf
    <div>
        <label for="id">Nome da Reserva</label>
        <input type="text" name="id" placeholder="Ex.:Nome da empresa ou aniversariante">
        
    </div>
    <div id="data">
    <label for="data">Data de Reserva:</label>
        <input type="date" name="data" >
    </div>
    <div id="horas">
        <label for="title">Horas:</label>
        <select name="horas">
        <option value="17">17:00</option>
        <option value="18">18:00</option>
        <option value="19">19:00</option>
        <option value="20">20:00</option>
        <option value="21">21:00</option>
        <option value="22">22:00</option>
        </select>
        <br>
    </div>
    <div id="pessoas">
        <label for="title">Pessoas:</label>
        <select name="pessoas">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option> 
        </select>
    </div>
    <br>
    <p><input class="btn btn-sour" type="submit" value="Reservar"/></p>
    <p><input class="btn btn-sour" type="reset" value="Limpar"/></p>
    </form>
</div>
</center>
@endsection