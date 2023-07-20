@extends('layouts.main')

@section('titulo', 'Meraki.JE')

@section('content')

    <h1>Produtos</h1>
    {{-- @if ($id != null)
        <p>Exibindo produto id: {{$id}}</p>
    @endif --}}
    
    @if ($busca != ' ')
        <p>O usuario está buscando por: {{$busca}} </p>
        
    @endif

@endsection