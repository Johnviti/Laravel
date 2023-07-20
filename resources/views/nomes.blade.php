<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()-> getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>nomes</title>

</head>
<body>
    <h1>Nomes Descritos!</h1>
    @foreach ($nomes as $nome)
        <p> {{$nome}} </p>
    @endforeach
</body>
</html>