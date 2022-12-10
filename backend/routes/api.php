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
//Rotas de convidados
Route::get('/', function () {return view('Home');});

Route::get('/cardapio', [ProdutoController::class, 'index'])->name('menu');

Route::get('/promocoes', [PromocoeController::class, 'index'])->name('promocoes');
Route::get('/promocoes/{id}', [PromocoeController::class, 'show'])->name('promocoes.show');

Route::get('/cadastro', [SiteController::class,'cadastro'])->name('cadastro')->middleware('guest');
Route::POST('/cadastro', [ClienteController::class, 'store'])->name('cadastrar')->middleware('guest');

Route::get('/entrar', [SiteController::class, 'entrar'])->name('entrar')->middleware('guest');
Route::POST('/entrar', [ClienteController::class, 'entrar'])->middleware('guest');

//Rotas de Logados
Route::get('/reserva', [ReservaController::class, 'create'])->name('reservar')->middleware('auth');
Route::POST('/reserva', [ReservaController::class, 'store'])->name('agendar')->middleware('auth');

Route::get('/dashboard/{id}', [ReservaController::class, 'show'])->name('reserva.show')->middleware('auth');
Route::get('/dashboard', [ReservaController::class, 'dashboard'])->middleware('auth');
Route::get('/dashboard/{id}', [ReservaController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/update/{id}', [ReservaController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/{id}', [ReservaController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard', [SiteController::class, 'autenticado'])->name('autenticado')->middleware('auth');
Route::get('/cookie/set',[SiteController::class, 'setCookie'])->name('setCookie');
Route::get('/cookie/get',[SiteController::class, 'getCookie'])->name('getCookie');

