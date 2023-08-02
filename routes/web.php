<?php

use Illuminate\Support\Facades\Route;

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


use App\Http\Controllers\MerakiController;

Route::get('/', [MerakiController::class,'index']);

Route::get('/clientes-resgistrados', [MerakiController::class,'resgistrados'])->middleware('auth');
Route::get('/cliente/create/', [MerakiController::class,'create']);
route::post('/cliente',[MerakiController::class,'store']);

route::get('/produtos/carrinho', [MerakiController::class, 'testeCarrinhoCompra'])->name('testeCarrinhoCompra');

route::get('/produtos/carrinho/{id}', [MerakiController::class, 'CarrinhoCompra'])->name('CarrinhoCompra');

Route::get('/produtos/create', [MerakiController::class,'adicionar'])->middleware('auth');
Route::post('/produtos',[MerakiController::class,'storeproduct']);
Route::get('/produtos/{id}', [MerakiController::class,'show']);

// Deletar dados de produtos selecionados
Route::delete('/produtos/{id}', [MerakiController::class,'destroy'])->middleware('auth');
// editar produtos
Route::get('/produtos/edit/{id}', [MerakiController::class,'edit'])->middleware('auth');
Route::put('/produtos/update/{id}', [MerakiController::class,'update'])->middleware('auth');


// fazer a comprar do produto
Route::post('/produtos/buy/{id}', [MerakiController::class,'buyProducts'])->middleware('auth')->name('buyProducts');
// Deletar dados de produtos selecionados
Route::delete('/compra/{id}', [MerakiController::class,'destroyCompra'])->middleware('auth');

// fazer a comprar do produto



Route::get('/dashboard', [MerakiController::class,'dashboard'])->middleware('auth');
