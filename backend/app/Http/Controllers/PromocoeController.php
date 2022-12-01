<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Promocoe;

class PromocoeController extends Controller
{
    public function index() {

        $promocoes = Promocoe::all();

        return view('promo',['promocoes' => $promocoes]);
    }

    public function show($id) {

        $promocao = Promocao::all();     
        
        return view('promocao.show', ['promocao' => $promocao]);
    }

}
