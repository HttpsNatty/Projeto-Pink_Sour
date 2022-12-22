<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Response;
use App\Http\Requests;

use App\Models\Cliente;

class ClienteController extends Controller
{
    public function store(Request $request) {
        
        $hoje = date('Y/m/d');

        $nome = $request->input('nome');
        $email = $request->input('email');
        $data = $request->input('data');
        $senha = $request->input('senha');
        $repsenha = $request->input('repsenha');
        $termos = $request->input('termos');
        
        if($nome==null || $email==null || $data==null || $senha==null || $repsenha==null || $repsenha!=$senha){
            return redirect(route('cadastro'))->with('error', 'Cadastro incompleto');
        }elseif($data > $hoje){
            return redirect(route('cadastro'))->with('error', 'A data é futura, confira sua data de nascimento');
        }

        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->data = $request->data;
        $cliente->senha = $request->senha;
     
        $cliente->save();
      
        return redirect(route('entrar'))->with('msg', 'Cadastro criado com sucesso!');
    }

    public function cadastro(){

        return view('cadastro');
    }

    public function cadastrada() {

        return view('entrar');
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

        $cliente = Cliente::find(1);

               
        Auth::login($cliente);
        return redirect(route('painel'))->with('msg', 'Login com sucesso!');
    }

    public function edit($id) {

        // Procura o id do cliente
        $cliente = Cliente::findOrFail($id);

        // Direciona para edição
        return view('cliente/edit', ['cliente' => $cliente]);
    }

    public function update(Request $request) {

        // Puxa todos os dados do cliente em forma de array
        $dados = $request->all();

        // Verifica se preencheu os campos
        if($nome==null || $email==null || $data==null || $senha==null || $repsenha==null || $repsenha!=$senha){
            return redirect(url('cliente/edit/' . $request->id ))->with('error', 'Cadastro incompleto');
        }

        // Procura o id do cliente e atualiza os dados
        Cliente::findOrFail($request->id)->update($dados);
    
        // Feedback de sucesso
        return redirect(route('adminis'))->with('msg', 'Cliente editada com sucesso!');
    }

    public function destroy($id){

        // Procura o cliente pelo id
        Cliente::findOrFail($id)->delete();

        // Feedback de exclusão com sucesso
        return redirect(route('adminis'))->with('msg', 'Cliente excluído com sucesso!');
    }
}
