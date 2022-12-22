@extends('layout.master')

@section('title', 'Pink Sour | Central')

@section('content')

Controle de banco

<h2>O que deseja fazer?</h2>

<button class="tablink" onclick="openPage('Produtos', this, '#d24b38')">Produtos</button>
<button class="tablink" onclick="openPage('Promocoes', this, '#6daf2f')" id="defaultOpen">Promoções</button>
<button class="tablink" onclick="openPage('Clientes', this, '#d56602')">Clientes</button>
<button class="tablink" onclick="openPage('Reservas', this, '#7766a2')">Reservas</button>

<div id="Produtos" class="tabcontent">
  <h3>Produtos</h3>
  <div>
    @if(count($produtos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Limitado</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->limitado }}</td>
                        <td>{{ $produto->imagem }}</td>
                        <td><a href="/LINK{{ produto->id }}">Editar</a>
                        <form action="/dashboard/{{ $produto->id }}" LINK method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    @else
        <p>Não há produtos no Banco!</p>
    @endif
    <a class="btn-sour" href="/LINK">Crie um novo!</a>
    </div>
</div>

<div id="Promocoes" class="tabcontent">
  <h3>Promoções</h3>
  <div>
    @if(count($promocoes) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($promocoes as $promocoe)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $promocoe->nome }}</td>
                        <td>{{ $promocoe->descricao }}</td>
                        <td><a href="/promocoes/edit/{{ $promocoe->id }}">Editar</a>
                        <form action="/promocoes/delete/{{ $promocoe->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    @else
        <p>Não há promoções no Banco!</p>
    @endif
    <a class="btn-sour" href="/promocoes/create">Crie uma nova!</a>
    </div>
</div>

<div id="Clientes" class="tabcontent">
  <h3>Clientes</h3>
  <div>
    @if(count($clientes) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
	  <th scope="col">Data de Nascimento</th>
	  <th scope="col">Senha</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ date('d/m/Y', strtotime($cliente->data)) }}</td>
                        <td>{{ $cliente->senha }}</td>
                        <td><a href="/clientes/edit/{{ $cliente->id }}">Editar</a>
                        <form action="/clientes/delete/{{ $cliente->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    @else
        <p>Não há clientes no Banco!</p>
    @endif
        <a class="btn-sour" href="/cadastro">Crie um novo!</a>
    </div>
</div>

<div id="Reservas" class="tabcontent">
  <h3>Reservas</h3>
  <div>
    @if(count($reservas) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Horas</th>
                    <th scope="col">Pessoas</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $reserva->nome }}</td>
                        <td>{{ date('d/m/Y', strtotime($reserva->data)) }}</td>
                        <td>{{ $reserva->horas }}</td>
                        <td>{{ $reserva->pessoas }}</td>
                        <td><a href="/reserva/edit/{{ $reserva->id }}">Editar</a>
                        <form action="/reservas/delete/{{ $reserva->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    @else
        <p>Não há reservas no Banco!</p>
    @endif
    <a class="btn-sour" href="/reserva">Crie uma nova!</a>
    </div>
</div>

<script>
    function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
@endsection