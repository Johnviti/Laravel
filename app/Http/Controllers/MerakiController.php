<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;

class MerakiController extends Controller
{
    
    public function index(){

        $products= Products::all();
          
        return view('welcome',['products' => $products]);

    }

    public function create(){

        return view('produtos.create');
    }

}

