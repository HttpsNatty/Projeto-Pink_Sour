<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controller\Controllers;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PromocoeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservaController;


use App\Models\User;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Promocoe;

class UserController extends Controller
{   
    public function admin(Request $request) {
        $email = $request->input('email');
        $senha = $request->input('senha');

        if($email==null || $senha==null){
            return redirect(route('admin'))->with('msg', 'Login incorreto');
        }
        
        $admin = User::query()
            ->where('email', $request->input('email'))
            ->first();
        
        $admin = User::find(1);

        if($email != $admin->email){
            return redirect(route('admin'))->with('msg', 'Login incorreto');
        }

        if($senha != $admin->password){
            return redirect(route('admin'))->with('msg', 'Senha incorreta');
        }

       
    }
    
    public function administrador(){
        return view('admin');
    }

    public function adminis(){

        $produtos = Produto::all();
        $promocoes = Promocoe::all();
        $clientes = Cliente::all();
        $reservas = Reserva::all();

        return view('painel', ['produtos' => $produtos, 'promocoes' => $promocoes, 'clientes' => $clientes, 'reservas' => $reservas]);
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
