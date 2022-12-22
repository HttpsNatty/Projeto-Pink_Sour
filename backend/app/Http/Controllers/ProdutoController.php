<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

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

    public function create()
    {
        return view('produto.create');
    }
    
}
?>