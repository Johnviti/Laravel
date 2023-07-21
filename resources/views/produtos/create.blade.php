@extends('layouts.main')

@section('titulo', 'Produtos')

@section('content')

    <div id="cadastro-create-container" class="col-md-6 offset-md-3">
        <h1>Solicite um orçamento</h1>
        <form action="/products" method="POST">
            <div class="form-group">
                <label for="title">Nome completo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Seu nome">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Seu nome">
            </div>
            <div class="form-group">
                <label for="title">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="(82)999999999">
            </div>
            <div class="form-group">
                <label for="title">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua são ...">
            </div>
        </form>
    </div>


@endsection