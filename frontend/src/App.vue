<template>
  <div>
    <Navbar />
    <router-view />
    <Footer />
  </div>
</template>

<script>
import Navbar from './components/Navbar'
import Footer from './components/Footer'
export default {
  data: function() {
    return {
      app_name: "Pink Sour",
    }    
  },
    
  components: {
    Navbar,
    Footer
  }
};
</script>

<style>
* {
  font-family: Helvetica;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
.main-container {
  margin: 50px;
  min-height: 250px;
}
h1 {
  text-align: center;
  font-size: 42px;
  margin-bottom: 30px;
  color: #222;
}
h2{
  font-size: 2rem;
  width: 100%;
  text-align: center;
  font-weight: 900;
}
p{
    font-size: 25px;
    width: auto;
    padding: 8px 12px;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}
input{
  width: 95%;
  height: 60px;
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-bottom: 15px;
}
input:focus{
  outline-color: #D34C59;
}
select:focus{
  outline-color: #D34C59;
}
.btn-sour{
  width: 50%;
  padding: 20px;
  margin: 0px 5px;
  cursor: pointer;
  background: #D34C59;
  color: white;
  font-size: 18px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  transition: 0.5s ease;
  position: relative;
  top: 50%;
  transform: translateY(0%);
}
.btn-sour:hover{
  background: #C4B4F4;
}
.btn-white{
  width: 50%;
  padding: 20px;
  margin: 0px 5px;
  cursor: pointer;
  background: white;
  color: #D34C59;
  font-size: 18px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  transition: 0.5s ease;
  position: relative;
  top: 50%;
  transform: translateY(0%);
}
a{
    text-decoration: none;
    margin-top: 10px;
    margin-bottom: 20px;
    color: black;
}
a:hover{
    color: #D34C59;
}
.link{
    color: #D34C59;
}
input[type='checkbox']{
    display: inline-block;
    height: 20px;
    width: 5px;
    vertical-align: middle;
    color: #D34C59;
}
</style>
