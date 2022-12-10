<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;

use App\Http\Controllers\PromocoeController;

use App\Http\Controllers\ReservaController;

use App\Http\Controllers\ClienteController;

use App\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rotas de convidados
Route::get('/', function () {return view('Home');});

//Cardapio
Route::get('/cardapio', [ProdutoController::class, 'index'])->name('menu');

//Promoções
Route::get('/promocoes', [PromocoeController::class, 'index'])->name('promocoes');
Route::get('/promocoes/{id}', [PromocoeController::class, 'show'])->name('promocoes.show');

//Cadastro
Route::get('/cadastro', [SiteController::class,'cadastro'])->name('cadastro')->middleware('guest');
Route::POST('/cadastro', [ClienteController::class, 'store'])->name('cadastrar')->middleware('guest');

//Login
Route::POST('/entrar', [ClienteController::class, 'entrar'])->middleware('guest');
Route::get('/entrar', [SiteController::class, 'entrar'])->name('entrar')->middleware('guest');

//Rotas de Logados
//Reserva
Route::get('/reserva', [ReservaController::class, 'create'])->name('reservar')->middleware('auth');
Route::POST('/reserva', [ReservaController::class, 'store'])->name('agendar')->middleware('auth');

Route::get('/dashboard/{id}', [ReservaController::class, 'show'])->name('reservas_show')->middleware('auth');
Route::get('/dashboard', [ReservaController::class, 'dashboard'])->name('reserva_dashboard')->middleware('auth');
Route::get('/dashboard/{id}', [ReservaController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/update/{id}', [ReservaController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/{id}', [ReservaController::class, 'destroy'])->middleware('auth');
Route::get('/dashboard/', [SiteController::class, 'autenticado'])->name('autenticado')->middleware('auth');

//Cookies
Route::get('/cookie/set',[SiteController::class, 'setCookie'])->name('setCookie');
Route::get('/cookie/get',[SiteController::class, 'getCookie'])->name('getCookie');