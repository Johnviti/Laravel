@extends('layouts.main2')

@section('titulo', 'Meraki.JE')

@section('main2')
    

<div id="products-container" class="col-md-12">
    <h2>Clientes</h2>
    <p class="subtitle">Veja os clientes que solicitarao orçamento</p>
    <div id="cards-container" class="row">
     @foreach ($clientes as $cliente)
        <div class="card col-md-3">
            <div class="card-body">
                <p class="card-date">21/07/2023</p>
                <h5 class="card-title">{{$cliente->name}}</h5>
                <h5 class="card-title">{{$cliente->email}}</h5>
                <a href="#" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        
     @endforeach
    </div>
</div>


@endsection