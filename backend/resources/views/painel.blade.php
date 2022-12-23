@extends('layout.master')

@section('title', 'Pink Sour | Administrador')

@section('content')

<h2>Controle do Banco</h2>

<h1>O que deseja fazer?</h1>

<div>
<button class="tablink" onclick="openPage('Produtos', this, 'red')" id="defaultOpen">Produtos</button>
<button class="tablink" onclick="openPage('Promocoes', this, 'green')" >Promoções</button>
<button class="tablink" onclick="openPage('Clientes', this, 'blue')">Cliente</button>
<button class="tablink" onclick="openPage('Reservas', this, 'orange')">Reservas</button>

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
                        <td><a href="">Editar</a>
                        <form action="/admin/produto/{{ $produto->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    @else
        <p>Não há produtos no banco</p>
    @endif
    <a href="" class="btn-sour">Crie um novo</a>
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
                        <td><a href="/promocoe/edit/{{ $promocoe->id}}">Editar</a>
                        <form action="/admin/promo/{{ $promocoe->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    @else
        <p>Não há promocoes no banco</p>
    @endif
    <a href="/admin/promocao" class="btn-sour">Crie uma nova</a>
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
                        <td><a href="">Editar</a>
                        <form action="/admin/cliente/{{ $cliente->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    @else
        <p>Não há clientes no banco</p>
    @endif
    <a href="/cadastro" class="btn-sour">Crie um novo</a>
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
                        <td><a href="/reservas/edit/{{ $reserva->id }}">Editar</a>
                        <form action="/admin/reserva/{{ $reserva->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    @else
        <p>Não há reservas no banco</p>
    @endif
    <a href="/reserva">"" class="btn-sour">Crie uma nova</a>
    </div>
</div>

</div>


<style>
    body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#Produtos {background-color: red;}
#Promocoes {background-color: green;}
#Clientes {background-color: blue;}
#Reservas {background-color: orange;}
</style>

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