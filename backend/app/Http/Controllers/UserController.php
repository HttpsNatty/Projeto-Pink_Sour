<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\DateTime;
use App\Http\Requests;
use App\Http\Controller\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Produto;
use App\Models\Promocoe;
use App\Models\Cliente;
use App\Models\Reserva;

class UserController extends Controller
{   
    public function adminEntrar() {

        return view('admin');
    }

    public function administrando(Request $request){
                
        $email = $request->input('email');
        $senha = $request->input('senha');

        if($email==null || $senha==null){
            return redirect('adm')->with('error', 'Login incorreto');
        } 
        
        $user = User::query()
            ->where('email', $request->input('email'))
            ->first();

        $user = User::find(1);

        if($request->senha != $user->senha){
            return redirect('adm')->with('error', 'Senha incorreta');
        }
       
        Auth::login($user);
        return redirect(route('admin.painel'))->with('msg', 'Login com sucesso!');
    }

    public function painel(){

        $produtos = Produto::all();
        $promocoes = Promocoe::all();
        $clientes = Cliente::all();
        $reservas = Reserva::all();

        return view('painel', ['produtos' => $produtos, 'promocoes' => $promocoes, 'clientes' => $clientes, 'reservas' => $reservas]);
    }

}