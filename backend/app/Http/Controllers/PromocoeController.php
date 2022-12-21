<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Promocoe;

class PromocoeController extends Controller
{
    public function index() {

        $promocoes = Promocoe::all();
        
        return response()->json([
            'promocoes' => json_encode($promocoes),
        ]);
    }
}
