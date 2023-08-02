@extends('layouts.main')

@section('titulo', 'Dashboard')

@section('content')


<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus produtos</h1>
    <a href="{{route('testeCarrinhoCompra')}}">Carrinho de compras</a>
</div>
<div class="col-md-10 offset-md-1 dashboard-produtos-container">
    @if (count($produtos) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Qtd</th>
                <th scope='col'>Opções</th>
            </tr>
        </thead> 
    <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <td scropt="row">{{$loop->index+1}} </td>
                <td><a href="/produtos/{{$produto->id}}">{{$produto->name}}</a></td>
                <td>{{$produto->qtd}}</td>
                <td> 
                    <a href="/produtos/edit/{{{$produto->id}}}" class="btn btn-info edit-btn"> Editar <ion-icon name="create-outline"> </a> 
                    <form action="/produtos/{{$produto->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">Deletar<ion-icon name="trash-outline"> </button>
                    </form>
                </td>
            </tr>
            
        @endforeach
    </tbody>
    </table>
    @else
        <p>Você ainda não tem nenhum produto cadastrado, <a href="/produtos/create">Adicionar produtos</a></p>
    @endif
    
</div>

@endsection