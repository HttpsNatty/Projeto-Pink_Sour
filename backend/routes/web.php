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

//Cardapio
Route::get('/cardapio', [ProdutoController::class, 'search'])->name('menu');

//Promoções
Route::get('/promocoes', [PromocoeController::class, 'index'])->name('promocoes');

//Cadastro
Route::get('/cadastro', [ClienteController::class,'cadastro'])->name('cadastro')->middleware('guest');
Route::POST('/cadastro', [ClienteController::class, 'store'])->name('cadastrar')->middleware('guest');

// //Login
Route::POST('/entrar', [ClienteController::class, 'entrar'])->middleware('guest');
Route::get('/entrar', [ClienteController::class, 'cadastrada'])->name('entrar')->middleware('guest');

//Rotas de Logados
//Reserva
Route::get('/reserva', [ReservaController::class, 'create'])->name('reservar')->middleware('auth');
Route::POST('/reserva', [ReservaController::class, 'store'])->name('agendar')->middleware('auth');

Route::get('/dashboard/', [ReservaController::class, 'show'])->name('reservas_show')->middleware('auth');
Route::get('/dashboard', [ReservaController::class, 'dashboard'])->name('painel')->middleware('auth');
Route::get('/reserva/edit/{id}', [ReservaController::class, 'edit'])->name('editar')->middleware('auth');
Route::put('/reserva/update/{id}', [ReservaController::class, 'update'])->name('atualizar')->middleware('auth');
Route::delete('/dashboard/{id}', [ReservaController::class, 'destroy'])->name('apagar')->middleware('auth');

//Administrativo
Route::get('/admin/login', [UserController::class, 'administrador'])->name('admin');
Route::POST('/admin/login', [UserController::class, 'admin'])->name('administrar');
Route::get('/admin/painel', [UserController::class, 'adminis'])->name('adminis');

// Promoções
Route::get('/promocoes/create', [PromocoeController::class, 'create'])->name('promocao.abrir');
Route::POST('/promocoes/create', [PromocoeController::class, 'store'])->name('promocao.criar');
Route::get('/promocoes/edit/{id}', [PromocoeController::class, 'edit'])->name('promocao.editar');
Route::put('/promocoes/update/{id}', [PromocoeController::class, 'update'])->name('promocao.atualizar');
Route::delete('/promocoes/delete/{id}', [PromocoeController::class, 'destroy'])->name('promocao.apagar');

// Clientes
Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit'])->name('cliente.editar');
Route::put('/clientes/update/{id}', [ClienteController::class, 'update'])->name('cliente.atualizar');
Route::delete('/clientes/delete/{id}', [ClienteController::class, 'destroy'])->name('cliente.apagar');

// Reserva
Route::delete('/reservas/delete/{id}', [ReservaController::class, 'destroy'])->name('reserva.apagar');

//Cookies
// Route::get('/cookie/set',[SiteController::class, 'setCookie'])->name('setCookie');
// Route::get('/cookie/get',[SiteController::class, 'getCookie'])->name('getCookie');