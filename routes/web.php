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



Route::get('/', function () {

    $arr=[10,20,30,40];

    $nome = "John";
      
    return view('welcome',
    [   'nome' => $nome,
        'arr' => $arr
        
    ]);
});

Route::get('/nomes', function(){

    $nomes = ['John', 'Lane', 'Vitoria'];

    return view('nomes', ['nomes' => $nomes]); 
});

Route::get('/produtos', function(){

    $busca = request('search');

    return view('produtos', ['busca'=> $busca]);
});

Route::get('/produtos_teste/{id?}', function($id=null){

    return view('produtos', ['id' => $id]);
});
