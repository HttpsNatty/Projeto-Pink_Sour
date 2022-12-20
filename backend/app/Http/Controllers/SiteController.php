<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controller\Controllers;
use App\Models\Cliente;

class SiteController extends Controller
{   
    public function cadastro() {

        return view('cadastro');
    }
    
    public function entrar() {

        return view('entrar');
    }

    public function autenticado() {

        return view('dashboard');
    }

    // public function setCookie(Request $request){
    //     $tempo = 86400*30;
    //     $response = new Response('Set Cookie');
    //     $response->withCookie(cookie('$cliente->nome', 'MyValue', $tempo));
    //     return $response;
    // }

    // public function getCookie(Request $request){
    //     $value = $request->cookie('nome');
    //     echo $value;
    // }
}
