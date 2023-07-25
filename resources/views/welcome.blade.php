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
     @foreach ($produtos as $produto)
        <div class="card col-md-3">
            <img src="/img/produtos/{{ $produto->image }}"" alt="{{$produto->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$produto->name}}</h5>
                <p class="card-qtd">{{$produto->qtd}} und</p>
                <a href="/produtos/{{$produto->id}}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        
     @endforeach
    </div>
</div>




 @endsection
  