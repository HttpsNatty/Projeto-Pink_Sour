@extends('layout.main')

@section('title', 'Pink Sour | Cadastro')

@section('content')

<?php
$erronome = "";
$erroemail = "";
$errodata = "";
$errosenha = "";
$errorepsenha = "";


if($_SERVER['REQUEST_METHOD'] == "POST"){

    
    //Verifica se campo nome está vazio
    if(empty($_POST['nome'])){
        $erronome = "Por favor, preencha seu nome";
    }else{
        $nome= checkpost($_POST['nome']);
        if(!preg_match("/^[a-zA-Z-´]*$/", $nome)){
            $erronome = "Somente caracteres de A-Z";
        }
    }

    //Verifica se campo email está vazio
    if(empty($_POST['email'])){
        $erroemail = "Por favor, preencha seu e-mail";
    }else{
        $email= checkpost($_POST['email']);
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erroemail = "E-mail inválido";
        }
    }

     //Verifica se campo data está vazio
     if(empty($_POST['data'])){
        $errodata = "Por favor, preencha sua data de nascimento";
    }else{
        $data= checkpost($_POST['data']);        
    }


    //Verifica se campo senha está vazio
    if(empty($_POST['senha'])){
        $errosenha = "Por favor, preencha sua senha";
    }else{
        $senha= checkpost($_POST['senha']);
        if(!strlen($senha) <6){
            $errosenha = "Sua senha precisa ter no mínimo 6 caracteres";
        }
        if(!strlen($senha) >16){
            $errosenha = "Sua senha precisa ter no máximo 16 caracteres";
        }
    }

    //Verifica se campo repsenha está vazio
    if(empty($_POST['repsenha'])){
        $errorepsenha = "Por favor, repita sua senha";
    }else{
        $repsenha= checkpost($_POST['repsenha']);
        if($repsenha !== $senha) {
            $errorepsenha = "Suas senhas não coincidem!";
        }
    }

    //Se nao tiver erro vai para a pagina de login
    if(($erronome== "") && ($erroemail== "") && ($errosenha== "") && ($errorepsenha== "")){
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        header('Location: login.blade.php');
    }
}

function checkpost($valor){
    $valor = trim($valor);
    $valor = stripslashes($valor);
    $valor = htmlspecialchars($valor);
    return $valor;
}

function digitaValue($n){
    if(isset($_POST[$n])){
      echo "value='$_POST[$n]'";
    }
}

function checaSeValido($n){
    if(!empty($n)){echo "class='invalido'";}
}
  if (empty($erroNome) && empty($erroEmail) && empty($erroSenha) && empty($erroRepeteSenha)){
    header('Location: login.blade.php');
}
?>

<?php
    if(isset($_POST['submit'])){
        include('.env');
        printf($_POST['nome']);
        $email = $_POST['email'];
        $data = $_POST['data'];
        $senha = $_POST['senha'];
        
        $conexao = new mysql($_ENV);

        $result = mysql_query($conexao,"INSERT_INFO clientes (nome,email,data,senha) VALUES ($nome,$email,$data,$senha)");

        header ('login.blade.php');
    }
        
?>
<center>

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