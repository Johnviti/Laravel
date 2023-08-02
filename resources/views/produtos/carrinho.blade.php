@extends('layouts.main')

@section('titulo', 'Lista de compras')

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Lista de produtos comprados!</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-produtos-container">
        @if (count($produtoCarrinho) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Nome</th>
                        <th scope='col'>Categoria</th>
                        <th scope='col'>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtoCarrinho as $produtoComprado)
                        @foreach ($produtos as $produto)
                            @if ($produtoComprado->products_id == $produto->id and $produtoComprado->user_id == $user->id)
                                <tr>
                                    <td scropt="row">{{ $loop->index + 1 }} </td>
                                    <td><a href="/produtos/{{ $produto->id }}">{{ $produto->name }}</a></td>
                                    <td>{{ $produto->categoria }}</td>
                                    <td>
                                        <form action="/compra/{{ $produtoComprado->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Retirar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif  
                        @endforeach
                    @endforeach
                </tbody>
            </table>
                @else
                    <p>Você ainda não tem nenhum produto cadastrado, <a href="/">Adicionar produtos</a></p>
        @endif
    </div>

@endsection
