<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\User;

class ProdutoController extends Controller
{
    public function search() {

        $pesquisa = request('pesquisa');

        if($pesquisa) {

            $produtos = Produto::where([
                ['nome', 'like', '%'.$pesquisa.'%']
            ])->get();

        } else {
            $produtos = Produto::all();
        }        
    
        return view('cardapio',['produtos' => $produtos, 'pesquisa' => $pesquisa]);
    }

    public function index(){

        $produtos = Produto::all();

        return ($produtos);
    }

    public function destroy($id){

        // Procura o produto pelo id
        Produto::findOrFail($id)->delete();

        // Feedback de exclusão com sucesso
        return redirect(route('admin.painel'))->with('msg', 'Produto excluído com sucesso!');
    }
}


    // public function create()
    // {
    //     return view('produto.create');
    // }
    // public function show($id) {

    //     $produto = Produto::findOrFail($id);

    //     return view('produto.show', ['produto' => $produto]);        
    // }

?>