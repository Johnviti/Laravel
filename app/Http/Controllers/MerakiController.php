<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cliente;

use App\Models\Products;


class MerakiController extends Controller
{
    
    public function index(){

        $clientes= cliente::all();
          
        return view('welcome',['clientes' => $clientes]);

    }

    public function create(){

        return view('produtos.create');
    }

    public function clientes(){

        return view('produtos.clientes-registrados');
    }

    public function store(Request $request){
        

        $cliente= new cliente;
        $cliente->name = $request ->name;
        $cliente->email = $request ->email;
        $cliente->celular = $request ->celular;

        $cliente->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

}

