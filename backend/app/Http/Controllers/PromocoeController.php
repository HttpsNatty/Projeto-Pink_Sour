<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Promocoe;

class PromocoeController extends Controller
{
    // Função para ver as promoções
    public function api() {

        $promocoes = Promocoe::all();
        
        return ($promocoes);
    }

    // Função para ver as promoções
    public function index() {

        $promocoes = Promocoe::all();
        
        return view('promo', ['promocoes' => $promocoes]);
    }

    public function create() {
        return view('promocoe/create');
    }

    public function store(Request $request) {
        
        // Nova Promo
        $promocoe = new Promocoe;

        // Variaveis para completar
        $nome = $request->input('nome');
        $descricao = $request->input('descricao');
        
        // Confere se a data foi preenchida
        if($nome==null || $descricao==null){
            return redirect(route('promo.create'))->with('error', 'Promoção incompleta');
        }

        // Pegando os valores
        $promocoe->nome = $request->nome;
        $promocoe->descricao = $request->descricao;

        // Salvando a promo no banco
        $promocoe->save();

        // Feedback de sucesso
        return redirect(route('admin.painel'))->with('msg', 'Promoção criada com sucesso!');
    }

    public function edit($id) {

        // Procura o id da Promocao
        $promocoe = Promocoe::findOrFail($id);

        // Direciona para edição
        return view('promocoe/edit', ['promocoe' => $promocoe]);

    }

    public function update(Request $request) {

        // Puxa todos os dados da promocao em forma de array
        $dados = $request->all();

        if($request->nome==null ||$request->desricao){
            return redirect(url('promocoe/edit/' . $request->id ))->with('error', 'Promoção incompleta');
        }
        // Procura o id da promocao e atualiza os dados
        Promocoe::findOrFail($request->id)->update($dados);
    
        // Feedback de sucesso
        return redirect(route('admin.painel'))->with('msg', 'Promoção editada com sucesso!');
    }

    public function destroy($id){

        // Procura a promo pelo id
        Promocoe::findOrFail($id)->delete();

        // Feedback de exclusão com sucesso
        return redirect(route('admin.painel'))->with('msg', 'Promoção excluída com sucesso!');
    }
}
