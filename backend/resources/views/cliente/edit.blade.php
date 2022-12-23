@extends('layout.master')

@section('title', 'Pink Sour | Editando Cadastro')

@section('content')

<div id="event-create-container" class="forms"> <!-- Formulário de edição -->
  <h1>Editando: {{ $cliente->nome }}</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group"> <!-- Campo Nome -->
       <label for="nome">Nome da Reserva:</label>
        <input type="text" name="nome" value="{{ $clliente->nome }}">
    </div> 
    <div class="form-group"> <!-- Campo Email -->
       <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $clliente->email }}">
    </div> 
    <div class="form-group"> <!-- Campo Data -->
      <label for="data">Data de nascimento:</label>
      <input type="date" class="form-control" name="data" value="{{ date('Y/m/d', strtotime($cliente->data)) }}">
    </div>


<div class="forms">
    <h1><img id="garrafa" width="160px" src="/img/black.png">Cadastre-se<img id="garrafa" width="160px" src="/img/black.png"></h1>
    <div class="row-coluna">
        <div class="coluna">
            <!--Formulario de Cadastro-->
            <form name="cadastro" method="POST" action="{{route('cadastrar')}}"> 
            @csrf
            <div> <!--Campo Nome-->
                <label> Digite seu nome:</label><br>
                <input type="text" id="nome" name="nome" placeholder="Nome"><span class="erro"></span> 
            </div>
            <div> <!--Campo Email-->
                <label>Digite seu e-mail:</label><br>
                <input type="email" id="email" name="email" placeholder="E-mail">
            </div>
            <div> <!--Campo Data-->
                <label>Digite a data do seu aniversário:</label><br>
                <input type="date" id="data" name="data"><span class="erro"><br><br>
            </div>
            <div class=".container-senha"> <!--Campo Senha-->
                <label for="senha">Senha:</label><br>
                <input type="password" id="senha" name="senha" placeholder="Senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                <img id="olho" onclick=mostraSenha() width="25x" src="/img/close.svg"><br>
                <label>Confirmação senha:</label><br>
                <input type="password" id="repsenha" name="repsenha" placeholder="Repetir senha">
            </div>
            <div> <!--Area dos termos -->
                <input type="checkbox" id="termos" name="termos" value="ok" style=width:150px required>
                <label>Ao se cadastar, concorda com a nossa 
                <div class="popup" onclick="myFunction()">Política de Privacidade
                    <span class="popuptext" id="myPopup">Coletamos os dados que você nos fornece ao registrar uma conta. Armazenamos alguns automaticamente (inclusive com tecnologias do tipo ‘cookies’), mas não compartilhamos seus dados de contato. 
                    </span>
                </div>
                e os <div class="popup" onclick="myFunction2()">Termos de uso
                    <span class="popuptext" id="myPopup2">Concedemos a você uma licença limitada, não exclusiva, intransferível e revogável para usar e desfrutar dos serviços da PinkSour.
                    </span>
                    </div>.
                </label>
            </div>
            <!-- Botão -->
            <p><input class="btn btn-sour" type="submit" value="Cadastrar"/></p>
            <div><p>Já possui cadastro? <a href="/login">Login</a></p>
            </form>
            </div>
        </div>
        <div class="coluna" name="vantagem">
            <h2>Clube de Vantagens</h2>
            <p> Ao fazer o cadastro, você poderá:
                <ul>
                    Fazer reserva;<br>
                    Participar nossa cartela de fidelidade;<br>
                    Mensagem especial de aniversário<br>
                </ul>
            </p>
            <div id="message">
                    <h2>A senha deve conter:</h2>
                    <p id="letter" class="invalid">Uma letra <b>minúscula</b></p>
                    <p id="capital" class="invalid">Uma letra <b>maiúscula</b></p>
                    <p id="number" class="invalid">Um <b>número</b></p>
                    <p id="length" class="invalid">Ter no mínimo <b>6 caracteres</b></p>
                </div>
        </div>
    </div>

</div></center>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->

<script language="javascript" type="text/javascript">
    let myInput = document.getElementById("senha");
    let letter = document.getElementById("letter");
    let capital = document.getElementById("capital");
    let number = document.getElementById("number");
    let length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

myInput.onkeyup = function() {
  // Validação letra miniscula
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validação letra maiuscula
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validação numeros
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
    } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
    }

  // Validação tamanho
  if(myInput.value.length >= 6) {
    length.classList.remove("invalid");
    length.classList.add("valid");
    } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
    }    
}
    const olho = document.getElementById("olho")
    let senha = document.getElementById("senha")
    let repsenha = document.getElementById("repsenha")

    function mostraSenha(){
        if(senha.type=="password"){
            senha.type="text";
            repsenha.type="text";
            olho.setAttribute("src", "/img/open.svg")
        }else{
            senha.type="password";
            repsenha.type="password";
            olho.setAttribute("src", "/img/close.svg")
        }
    }

    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
    
    function myFunction2() {
        var popup = document.getElementById("myPopup2");
        popup.classList.toggle("show");
    }
</script>

</body>

@endsection