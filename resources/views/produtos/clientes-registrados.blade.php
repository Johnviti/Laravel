@extends('layouts.main')

@section('titulo', 'Meraki.JE')

@section('content')
    

<div id="products-container" class="col-md-12">
    <h2>Clientes</h2>
    <p class="subtitle">Veja os clientes que solicitarao orçamento</p>
    <div id="cards-container" class="row">
     @foreach ($clientes as $cliente)
        <div class="card col-md-3">
            <div class="card-body">
                <h5 class="card-title">{{$cliente->name}}</h5>
                <h5 class="card-title">{{$cliente->email}}</h5>
                <h5 class="card-title"><ion-icon name="call-outline"></ion-icon>  {{$cliente->celular}}</h5>
                <p>{{$cliente->description}}</p>
            </div>
        </div>
        
     @endforeach
    </div>
</div>


@endsection