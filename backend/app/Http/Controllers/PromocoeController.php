<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Promocoe;
use App\Models\User;

class PromocoeController extends Controller
{
    // Função para ver as promoções
    public function api() {

        $promocoes = Promocoe::all();
        
        return ($promocoes);
    }

    public function index() {

        $promocoes = Promocoe::all();
        
        return view('promo', ['promocoes' => $promocoes]);
    }

    public function create() {
        return view('/promocoe/create');
    }

    // Função para criar
    public function store(Request $request){

        // Nova Promoção
        $promocoe = new Promocoe;

        // Variaveis para completar a promoção
        $nome = $request->input('nome');
        $descricao = $request->input('descricao');
        
        // Conferência
        if($nome==null || $descricao==null){
            return redirect(route('promocao.criar'))->with('error', 'Promoção incompleta');
        }

        // Pegando os valores
        $promocoe->nome = $request->nome;
        $promocoe->descricao = $request->descricao;

        // Salva a promoção no banco
        $promocoe->save();

        // Feedback de sucesso
        return redirect(route('adminis'))->with('msg', 'Promoção criada com sucesso!');
    }

    public function edit($id) {

        // Procura o id da promo
        $promocoe = Promocoe::findOrFail($id);

        // Direciona para edição
        return view('promocoe/edit', ['promocoe' => $promocoe]);
    }

    public function update(Request $request) {

        // Puxa todos os dados da promo em forma de array
        $dados = $request->all();

        // Verifica se preencheu os campos
        if($request->nome==null || $request->descricao==null){
            return redirect(url('promocoe/edit/' . $request->id ))->with('error', 'Promo incompleta');
        }

        // Procura o id da promo e atualiza os dados
        Promocoe::findOrFail($request->id)->update($dados);
    
        // Feedback de sucesso
        return redirect(route('adminis'))->with('msg', 'Promoção editada com sucesso!');
    }

    public function destroy($id){

        // Procura a promo pelo id
        Promocoe::findOrFail($id)->delete();

        // Feedback de exclusão com sucesso
        return redirect(route('adminis'))->with('msg', 'Promoção excluída com sucesso!');
    }
}
