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

Route::get('/clientes', [MerakiController::class,'clientes']);

Route::get('/produtos/create', [MerakiController::class,'create']);
route::post('/produtos',[MerakiController::class,'store']);


Route::get('/produtos', function(){

    return view('produtos');
});
