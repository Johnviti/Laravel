@extends('layouts.main')

@section('titulo', $produto->name)

@section('content')


    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/produtos/{{$produto->image}}" alt="{{$produto->name}}" class="img-fluid">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{$produto->name}}</h1>
                <p class="produto-categoria"><ion-icon name="document-text-outline"></ion-icon>{{$produto->categoria}}</p>
                <p class="produtos-qtd"><ion-icon name="star-outline"></ion-icon>{{$produto->qtd}} und</p>
                <p>Postado por:</p>
                <p class="produtos-qtd"><ion-icon name="person-circle-outline"></ion-icon> {{$produtoOwner['name']}}</p>
                <form action="/produtos/buy/{{$produto->id}}" method="POST">
                    @csrf
                    <input type="text" hidden value="{{$produto->id}}" name="products_id">
                    @auth
                    <input type="text" hidden value="{{$user->id}}" name="user_id">
                    @endauth
                    @if ($produto->qtd  == '0')
                        <p class="btn btn-primary" id="produto-submit">Sem unidades disponiveis</p>
                    @else
                        <a href="/produtos/buy/{{$produto->id}}">
                            <button type="submit"class="btn btn-primary" id="produto-submit">Comprar</button>
                        </a>
                    @endif
                </form>   
                <h3>Especificações:</h3>
                <ul id="items-list">
                    @foreach ($produto->items as $item)
                        <li><ion-icon name="play-outline"></ion-icon>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o produto:</h3>
                <p class="produto-description">{{$produto->description}}</p>
            </div>
        </div>
    </div>


@endsection