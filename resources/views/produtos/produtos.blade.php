@extends('layouts.main')

@section('titulo', 'Produtos')

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
                <label for="title">Produto</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Camisa">
            </div>

            <div class="form-group">
                <label for="title">Categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Roupa" >
            </div>

            <div class="form-group">
                <label for="title">Quantidade?</label>
                <input type="text" class="form-control" id="qtd" name="qtd" placeholder="10">
            </div>
            <div class="form-group">
                <label for="title">Descrição</label>
                <textarea name="description" id="description" class="form-control" placeholder="descreva o produto?">Descrição!</textarea>
            </div>
            <div class="form-group">
                <label for="title">Adicione as especificações do produto</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Smart">Smart
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Poliamida">Poliamida
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Importado">Importado
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Nacional">Nacional
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="adicionar produto">
        </form>
    </div>


@endsection