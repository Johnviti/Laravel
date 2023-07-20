<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()-> getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=fo, initial-scale=1.0">
        
        <title>@yield('titulo')</title>
        
        {{-- Fonte do Google --}}
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

        {{-- CSS Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        {{-- CSS da aplicação --}}
        <link rel="stylesheet" href="\css\styles.css">
        <script src="\js\scripts.js"></script>

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collpase" id="navbar">
                    <a href="" class="navbar-brand">
                        <img src="/img/logo.jfif" alt="logo">
                    </a>
                    <lu class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Loja</a>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">Produtos</a>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">Entrar</a>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">cadastrar</a>
                        </li>
                    </lu>
                </div>
            </nav>
        </header>

         @yield('content')
         <footer>
            <p>MERAKI &copy; 2023</p>
         </footer>
    </body>
</html>