<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Promocoe;

class PromocoeController extends Controller
{
    // Função para ver as promoções
    public function index() {

        $promocoes = Promocoe::all();
        
        return ($promocoes);
    }
}
