<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cliente;

use App\Models\Products;
use Symfony\Component\HttpKernel\Event\RequestEvent;


class MerakiController extends Controller
{
    
    public function index(){

        $products= Products::all();
          
        return view('welcome',['products' => $products]);

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

        return redirect('/');

    }

}

