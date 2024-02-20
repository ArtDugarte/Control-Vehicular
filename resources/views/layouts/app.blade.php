<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preload" href="{{ asset('assets/css/style.css') }}" as="style" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Control Vehicular @yield('title')</title>
    @livewireStyles
</head>
<body>

    <header>
        <div class="contenedor-titulo">
            <h1 class="titulo">Sysprim Control Vehicular</h1>
        </div>
    </header>

    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <a href="{{ route('home') }}">Vehiculos</a>
            <a href="{{ route('marcas') }}">Marcas</a>
            <a href="{{ route('modelos') }}">Modelos</a>
        </nav>
    </div>

    @yield('content')
    @livewireScripts
</body>
</html>