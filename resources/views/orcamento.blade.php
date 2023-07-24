@extends('layouts.main')

@section('titulo', 'cliente')

@section('content')

    <div id="cadastro-create-container" class="col-md-6 offset-md-3">
        <h1>Solicite um orçamento</h1>
        <form action="/productos" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Nome completo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome completo">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com">
            </div>
            <div class="form-group">
                <label for="title">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="(82)999999999">
            </div>
            <input type="submit" class="btn btn-primary" value="Solicitar">
        </form>
    </div>


@endsection