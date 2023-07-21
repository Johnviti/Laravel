@extends('layouts.main')

@section('titulo', 'Meraki.JE')

@section('content')
    


<div id="search-container" class="col-md-12">
    <h1>Busque por produtos</h1>
    <form action="">
        <input type="text" class="form-control" id="search" name="search" placeholder="Procurar..." >
    </form>
</div>

<div id="products-container" class="col-md-12">
    <h2>Produtos</h2>
    <p class="subtitle">Veja nossos produtos</p>
    <div id="cards-container" class="row">
     @foreach ($products as $product)
        <div class="card col-md-3">
            <img src="\img\product.png" alt="{{$product->title}}">
            <div class="card-body">
                <p class="card-date">21/07/2023</p>
                <h5 class="card-title">{{$product->title}}</h5>
                <a href="#" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        
     @endforeach
    </div>
</div>




 @endsection
  