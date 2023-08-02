<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cliente;

use App\Models\Products;

use App\Models\User;

use App\Models\products_user;


class MerakiController extends Controller
{
    
    public function index(){
        
        $search=request('search');
        $user = auth()->user(); 
        if($search){

            $produtos= Products::where([['name', 'like', '%'.$search.'%']]
            )->get();

        }else{

            $produtos= Products::all();
        }
          
        return view('welcome',['produtos' => $produtos, 'search'=>$search, 'user' => $user]);

    }

    public function adicionar(){
        $user = auth()->user();
        return view('produtos.produtos',['user' => $user]);
    }
    
    public function create(){
        $user = auth()->user();
        return view('produtos.create',['user' => $user]);
    }
    
    public function resgistrados(){
        
        $user = auth()->user();
        $clientes= cliente::all();
        return view('produtos.clientes-registrados', ['clientes' => $clientes,'user' => $user]);
    }


    public function store(Request $request){
        

        $cliente= new cliente;
        $cliente->name = $request ->name;
        $cliente->email = $request ->email;
        $cliente->celular = $request ->celular;
        $cliente->description = $request ->description;

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

        $user = auth()->user(); 
        $produto= Products::findorFail($id);

        $produtoOwner = user::where('id', $produto->user_id)->first()->toArray();

        return view('produtos.show', ['produto'=>$produto, 'produtoOwner' => $produtoOwner,'user' => $user]);
    }

    public function dashboard(){

        $user = auth()->user();
        
        $produtos= $user->products;

        return view('produtos.dashboard', ['produtos'=> $produtos,'user' => $user]);
}

    public function destroy($id){
        Products::findorFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Produto excluido com sucesso!');
    }

    public function destroyCompra($id){
        products_user::findorFail($id)->delete();
        return redirect()->back()->with('msg', 'Produto excluido com sucesso!');
    }

    public function edit($id){

        $produto= Products::findorFail($id);
        $user = auth()->user();

        return view('produtos.edit', ['produto'=>$produto,'user' => $user]);
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

            $user = auth()->user();
            $produto = Products::findOrFail($id);
            $user->productsBuy()->attach($id);
            $newqtd= $produto->qtd -1;

            $produto->qtd = $newqtd;

            $produto->save();

            return redirect('/')->with('msg', 'Produto adicionado no carrinho');
    
        }
    // protected function updateProduto($produto){
    //     
    // }

    public function carrinhoProducts($id){
        
        $user = $id;
        $produtos= products_user::findOrFail();
        dd($produtos);
        

        return view('produtos.carrinho', ['produtos'=>$produtos,'user' => $user]);
    }

    public function testeCarrinhoCompra()
    {
        $user = auth()->user(); 
        $produtos= Products::all();
        $users= User::all();
        $produtoCarrinho= products_user::all();
        
        return view('produtos.carrinho',['produtos' => $produtos, 'fornecedor' => $users, 'user' => $user, 'produtoCarrinho' => $produtoCarrinho]);
    }
}


