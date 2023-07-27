@extends('layouts.main')

@section('titulo', 'Meraki.JE')

@section('content')
    


<div id="search-container" class="col-md-12">
    <h1>Busque por produtos</h1>
    <form action="/" method="GET">
        <input type="text"  id="search" name="search" class="form-control" placeholder="Procurar..." >
    </form>
</div>

<div id="products-container" class="col-md-12">
    @if ($search)
     <h2>Pesquisando por {{$search}}</h2>
     <p class="subtitle">Produto(s) encontrado(s):</p>
    @else
    <h2>Produtos</h2>
    <p class="subtitle">Veja nossos produtos</p>
    @endif
    <div id="cards-container" class="row">
     @foreach ($produtos as $produto)
        <div class="card col-md-3">
            <img src="/img/produtos/{{ $produto->image }}" alt="{{$produto->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$produto->name}}</h5>
                <p class="card-qtd">{{$produto->qtd}} und</p>
                <a href="/produtos/{{$produto->id}}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        
     @endforeach
    
     @if (count($produtos)==0 && $search)
        <p>Não foi possível encontrar nenhum produto com {{$search}}! <a href="/">Ver todos</a> </p>
    @elseif(count($produtos)==0 )   
        <p>Não há produtos no momento!</p>
     @endif

    </div>
</div>




 @endsection
  