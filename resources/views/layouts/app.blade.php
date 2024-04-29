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

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center"> <!-- Añadir clase 'align-items-center' -->
                <li class="nav-item">
                    <form action="{{ url('/search') }}" method="GET" class="form-inline">
    <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
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