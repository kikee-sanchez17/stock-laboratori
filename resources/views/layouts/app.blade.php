<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Laravel App</title>
    
    <!-- Bootstrap CSS Link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo personalizado para eliminar el margen inferior en el párrafo */
        .nav-item p {
            margin-bottom: 0; /* Elimina el margen inferior */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home')}}">Stock Laboratori</a>

        <!-- Botón agregado al lado de "Stock Laboratori" -->
        <a href="{{  url('/log')}}" class="btn btn-primary ml-auto">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
        <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"></path>
        <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
    </svg>
    Log
</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center"> <!-- Añadir clase 'align-items-center' -->
                <li class="nav-item">
                    <form action="{{ url('/search') }}" method="GET" class="form-inline">
                        <input class="form-control" type="search" name="query" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
                @if(auth()->check())
                <li class="nav-item">
                    <p class="nav-link text-white m-0">Welcome: <b>{{auth()->user()->name}}</b></p> <!-- Añadir clase 'm-0' para eliminar el margen -->
                </li>
                <li class="nav-item">
                    <a href="{{ route('login.destroy')}}" class="btn btn-danger ml-2">Log Out</a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login.index')}}" class="nav-link font-semibold text-white">Log In</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register.index')}}" class="nav-link font-semibold border-2 border-white py-2 px-4 rounded-md text-white">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Bootstrap JS Links -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>