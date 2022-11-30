<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Promocao;

class PromocaoController extends Controller
{
    public function index() {
        // $user = auth()->user();
        //$cartela = user_id->cartela;

        return view('promo');
    }

    public function cartela() {
        $user = auth()->user();


        return view('dashboard');
    }

}
