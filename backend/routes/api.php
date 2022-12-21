<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

use App\Http\Controllers\PromocoeController;

use App\Http\Controllers\ReservaController;

use App\Http\Controllers\ClienteController;

use App\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// //Rotas de convidados
// Route::get('/', function () {return view('Home');});

// // //Cadastro
// Route::get('/cadastro', [SiteController::class,'cadastro'])->name('cadastro')->middleware('guest');
// Route::POST('/cadastro', [ClienteController::class, 'store'])->name('cadastrar')->middleware('guest');

// // //Login
// Route::POST('/entrar', [ClienteController::class, 'entrar'])->middleware('guest');
// Route::get('/entrar', [SiteController::class, 'entrar'])->name('entrar')->middleware('guest');

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization'); 

Route::middleware(['cors'])->group(function () {
    //Promocões
    Route::get('promocoes', [PromocoeController::class, 'index']);
    //Cardapio
    Route::get('cardapio', [ProdutoController::class, 'index']);
});

Route::middleware(['cors', 'guest'])->group(function () {
    Route::post('cadastro', [ClienteController::class, 'register']);Route::post('entrar', [ClienteController::class, 'entrar']);
});

Route::middleware(['cors', 'auth'])->group(function () {
    Route::get('dashboard', [ReservaController::class, 'dashboard'])->name('painel');
});


// Route::get('/dashboard', [SiteController::class, 'autenticado'])->name('autenticado')->middleware('auth');
// Route::get('/cookie/set',[SiteController::class, 'setCookie'])->name('setCookie');
// Route::get('/cookie/get',[SiteController::class, 'getCookie'])->name('getCookie');

