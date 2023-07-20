@extends('layouts.main')

@section('titulo', 'Meraki.JE')

@section('content')
    
<h1>PAG</h1>

<img src="/img/banner.jpg" alt="Banner de Judo">

@if(10>5)
    <p>Meu nome é {{$nome}}</p>
@else
    <p>False</p>
@endif
        

@for ($i = 0; $i < count($arr); $i++)
  <p> {{$arr[$i]}} </p>

 @endfor

 @endsection
  