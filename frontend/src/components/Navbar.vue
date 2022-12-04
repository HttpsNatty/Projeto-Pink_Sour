<template>
    <div>
      <div id="nav">
        <!-- <a to="avascript:void(0);" class="icon" @click="myFunction()"></a>
        <i class="fas fa-bars"> 
        </i> -->
        <div class="topnav" id="myTopnav">
            <router-link to="/" id="logo-url"><img src="/favicon.ico" class="logo" alt="Pink Sour"></router-link>
            <router-link to="/">Inicio</router-link>
            <router-link to="/cardapio">Cardapio</router-link>     
            <router-link to="/promocoes">Promocoes</router-link>     
            <router-link to="/entrar" class="split">Login</router-link>
            <router-link to="/cadastro" class="split">Cadastro</router-link>
        </div>
      </div>
    </div>
</template>
  
<script>
  export default {
    name: "Navbar"
}
</script>
  
<style scoped>
    .topnav {
    background-color: #C4B4F4;
    overflow: hidden;
    height: 65px;
    margin: auto;
    align-items: center;
    width: 100%;
}
  
.topnav a {
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}
  
.topnav a:hover {
    color: #D34C59;    
    transition-duration: 0.5s;
}
  
.topnav a.active {
    color: black;
}
  
.topnav .icon {
    display: none;
}

@media screen and (max-width: 600px) {
    .topnav a:not(:first-child) {display: none;}
    .topnav a.icon {
      float: right;
      display: block;
    }
}
  
@media screen and (max-width: 600px) {
    .topnav.responsive {position: relative;}
    .topnav.responsive a.icon {
      position: absolute;
      right: 0;
      top: 0;
    }
    .topnav.responsive a {
      float: none;
      display: block;
      text-align: left;
    }
}

.topnav a.split {
    float: right;
    color: black;
}

.topnav a.split:hover {
    color: #D34C59;    
    transition-duration: 0.5s;
}

.logo{
    margin-left: 20px;
    width: 40px;
    height: 40px;
}

#imagem-nav{
    width: 10px;
}
</style>