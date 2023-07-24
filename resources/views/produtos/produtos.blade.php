@extends('layouts.main')

@section('titulo', 'cliente')

@section('content')

    <div id="cadastro-create-container" class="col-md-6 offset-md-3">
        <h1>ADICIONE UM PRODUTO</h1>
        <form action="/produtos" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do produto:</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="title">Nome do produto</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome completo">
            </div>

            <div class="form-group">
                <label for="title">Categoria</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com">
            </div>

            <div class="form-group">
                <label for="title">Quantidade</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="(82)999999999">
            </div>

            <div class="form-group">
                <label for="title">Quantidade</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="(82)999999999">
            </div>
            <input type="submit" class="btn btn-primary" value="Solicitar">
        </form>
    </div>


@endsection