<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;

use App\Http\Controllers\PromocoeController;

use App\Http\Controllers\ReservaController;

use App\Http\Controllers\ClienteController;

use App\Http\Controllers\UserController;

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

// //Cardapio
Route::get('/cardapio', [ProdutoController::class, 'search'])->name('menu');

//Promoções
Route::get('/promocoes', [PromocoeController::class, 'index'])->name('promocoes');

//Cadastro
Route::get('/cadastro', [ClienteController::class,'cadastro'])->name('cadastro')->middleware('guest');
Route::POST('/cadastro', [ClienteController::class, 'store'])->name('cadastrar')->middleware('guest');

//Login
Route::POST('/entrar', [ClienteController::class, 'entrar'])->middleware('guest');
Route::get('/entrar', [ClienteController::class, 'cadastrado'])->name('entrar')->middleware('guest');

//Rotas de Logados
//Reserva
Route::get('/reserva', [ReservaController::class, 'create'])->name('reservar')->middleware('auth');
Route::POST('/reserva', [ReservaController::class, 'store']);

Route::get('/dashboard/', [ReservaController::class, 'show'])->name('reservas_show')->middleware('auth');
Route::get('/dashboard', [ReservaController::class, 'dashboard'])->name('painel')->middleware('auth');
Route::get('/reserva/edit/{id}', [ReservaController::class, 'edit'])->name('editar')->middleware('auth');
Route::put('/reserva/update/{id}', [ReservaController::class, 'update'])->name('atualizar')->middleware('auth');
Route::delete('/dashboard/{id}', [ReservaController::class, 'destroy'])->name('apagar')->middleware('auth');


// Rotas Administrativas
Route::get('admin/login', [UserController::class, 'adminEntrar'])->name('adm');
Route::POST('admin/login', [UserController::class, 'administrando'])->name('admin');
Route::get('admin/painel', [UserController::class, 'painel'])->name('admin.painel');


// Produtos
Route::delete('/admin/produto/{id}', [ProdutoController::class, 'destroy'])->name('prod.apagar');

//Promocoes
Route::get('/admin/promocao', [PromocoeController::class, 'create'])->name('promo.create');
Route::POST('/admin/promocao', [PromocoeController::class, 'store'])->name('promo.store');
Route::get('/promocoe/edit/{id}', [PromocoeController::class, 'edit'])->name('promo.editar');
Route::put('/promocoe/update/{id}', [PromocoeController::class, 'update'])->name('promo.atualizar');
Route::delete('/admin/promo/{id}', [PromocoeController::class, 'destroy'])->name('promo.apagar');

// Clientes
Route::delete('/admin/cliente/{id}', [ClienteController::class, 'destroy'])->name('cliente.apagar');


//Reserva
// Route::get('/reservas/edit/{id}', [ReservaController::class, 'edit'])->name('editar')->middleware('auth');
// Route::put('/reservas/update/{id}', [ReservaController::class, 'update'])->name('atualizar')->middleware('auth');
Route::delete('/admin/reserva/{id}', [ReservaController::class, 'destroy2'])->name('reserva.apagar');

//Cookies
// Route::get('/cookie/set',[SiteController::class, 'setCookie'])->name('setCookie');
// Route::get('/cookie/get',[SiteController::class, 'getCookie'])->name('getCookie');