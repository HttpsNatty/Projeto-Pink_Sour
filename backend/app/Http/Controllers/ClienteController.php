<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Auth;

use Hash;

use App\Models\Cliente;

class ClienteController extends Controller
{
    public function store(Request $request) {
        
        $hoje = date('d/m/Y');
        $data = date('d/m/Y');

        $nome = $request->input('nome');
        $email = $request->input('email');
        $data = $request->input('data');
        $senha = $request->input('senha');
        $repsenha = $request->input('repsenha');
        
        if($nome==null || $email==null || $data==null || $senha==null || $repsenha==null || $repsenha!=$senha){
            return redirect(route('cadastro'))->with('error', 'Cadastro incompleto');
        }

        $cliente = new Cliente;

        $cliente->id = $request->id;
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->data = $request->data;
        $cliente->senha = $request->senha;
     
        $cliente->save();

        return redirect(route('entrar'))->with('msg', 'Cadastro criado com sucesso!');

    }

    public function entrar(Request $request){
                
        $email = $request->input('email');
        $senha = $request->input('senha');

        
        if($email==null || $senha==null){
            return redirect(route('entrar'))->with('error', 'Login incorreto');
        } 
        
        $cliente = Cliente::query()
            ->where('email', $request->input('email'))
            ->first();
        if($senha !== $request->input('senha')){
            return redirect(route('entrar'))->with('error', 'Login incorreto');
        }
        $cliente = Cliente::find(1);

        Auth::login($cliente);
        return redirect(route('autenticado'))->with('msg', 'Login com sucesso!');
    }

    public function autenticado()
    {
        return view('/dashboard');        
    }
}
