<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cliente;

use App\Models\Products;

use App\Models\User;


class MerakiController extends Controller
{
    
    public function index(){

        $search=request('search');

        if($search){

            $produtos= Products::where([['name', 'like', '%'.$search.'%']]
            )->get();

        }else{

            $produtos= Products::all();
        }
          
        return view('welcome',['produtos' => $produtos, 'search'=>$search]);

    }

    public function adicionar(){

        return view('produtos.produtos');
    }
    
    public function create($id){

        $produto= Products::findorFail($id);
      
        return view('produtos.create',['produto' => $produto]);
    }
    
    public function resgistrados(){
       
        $clientes= cliente::all();
        
        return view('produtos.clientes-registrados', ['clientes' => $clientes]);
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
        $produto->qtd = $request ->qtd;
        $produto->description = $request ->description;
        $produto->categoria = $request ->categoria;
        $produto->items = $request ->items;
        var_dump($produto->items);

        if ($request-> hasfile('image') && $request->file('image')->isValid()) {
            
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/produtos'), $imageName);

            $produto->image = $imageName;
        }
        
        $user = auth()->user();
        $produto->user_id = $user->id;

        $produto->save();

        return redirect('/')->with('msg', 'produto adicionado com sucesso!');

    }

    public function show($id){

        $produto= Products::findorFail($id);

        $produtoOwner = user::where('id', $produto->user_id)->first()->toArray();

        return view('produtos.show', ['produto'=>$produto, 'produtoOwner' => $produtoOwner]);
    }

    public function dashboard(){

        $user = auth()->user();
        
        $produtos= $user->products;

        return view('produtos.dashboard', ['produtos'=> $produtos]);
}

    public function destroy($id){

        Products::findorFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Produto excluido com sucesso!');
    }

    public function edit($id){

        $produto= Products::findorFail($id);

        return view('produtos.edit', ['produto'=>$produto]);
    }

    public function update( Request $request){

        $data=$request->all();

        if ($request-> hasfile('image') && $request->file('image')->isValid()) {
            
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/produtos'), $imageName);

            $data['image'] = $imageName;
        }

        Products::findorFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Produto editado com sucesso!');
        
    }

    public function buyProducts($id){


            $cliente->produto()->attach($id);
            
            $cliente->save();
    
            return redirect('/')->with('msg', 'orçamento criado com sucesso!');
    
        }

}


