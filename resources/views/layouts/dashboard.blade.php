<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="btn-sidebar">
        <span class="bi bi-list"></span>
    </div>
    <nav class="sidebar">
        <div class="btn-sidebar-close">
            <span class="bi bi-x"></span>
        </div>
        <div class="text">
            Panel
        </div>
        <ul>
            <li><a href="{{ route('dashboard.index') }}"><i class="bi bi-house"></i> Inicio</a></li>
            <li><a href="{{ route('productos.index') }}"><i class="bi bi-boxes"></i> Productos</a></li>
            <li><a href="{{ route('cliente.index') }}"><i class="bi bi-person-lines-fill"></i>  Clientes</a></li>
            <li><a href="{{ route('user.index') }}"><i class="bi bi-person"></i>  Usuarios</a></li>
            <li><a href="{{ route('home') }}" class="text-danger"><i class="bi bi-door-open"></i> Salir</a></li>

            <div class="user">
                 <span class="text-success"><i class="bi bi-person"></i> {{ auth()->user()->name }}</span>
            </div>
        </ul>
    </nav>
        <main class="content">
            @yield('content')
        </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
