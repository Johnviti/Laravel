@extends('layouts.main2')

@section('titulo', 'Dashboard')

@section('main2')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus produtos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-produtos-container">
    @if (count($produtos) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Qtd</th>
                <th scope='col'>Dono</th>
            </tr>
        </thead> 
    <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <td scropt="row">{{$loop->index+1}} </td>
                <td><a href="/produtos/{{$produto->id}}">{{$produto->name}}</a></td>
                <td>{{$produto->qtd}}</td>
                <td> <a href="#">Editar</a> <a href="#">Deletar</a> </td>
            </tr>
            
        @endforeach
    </tbody>
    </table>
    @else
        <p>Você ainda não tem nenhum produto cadastrado, <a href="/produtos/create">Adidiconar produtos</a></p>
    @endif
    
</div>

@endsection