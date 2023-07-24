<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cliente;

use App\Models\Products;


class MerakiController extends Controller
{
    
    public function index(){

        $produtos= Products::all();
          
        return view('welcome',['produtos' => $produtos]);

    }

    public function adicionar(){

        return view('produtos.produtos');
    }
    
    public function create(){

        return view('produtos.create');
    }
    
    public function resgistrados(){
       
        $clientes= cliente::all();
        
        return view('produtos.clientes-registrados', ['clientes' => $clientes]);
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

        return redirect('/')->with('msg', 'orçamento criado com sucesso!');

    }

    public function storeproduct(Request $request){
        

        $produto= new Products;
        $produto->name = $request ->name;
        $produto->email = $request ->email;
        $produto->celular = $request ->celular;

        if ($request-> hasfile('image') && $request->file('image')->isValid()) {
            
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5( $requestImage->image->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImage->move(public_path('img/produtos'), $imageName);

            $produto->image = $imageName;
        }

        $produto->save();

        return redirect('/')->with('msg', 'orçamento criado com sucesso!');

    }

}

