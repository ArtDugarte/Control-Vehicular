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

    <header class="header">
        <div class="contenedor-titulo">
            <h1 class="titulo">Sysprim - Control Vehicular</h1>
        </div>
   
        <nav class="navegacion-principal">
            <a class="link" href="{{ route('home') }}">Vehiculos</a>
            <a class="link" href="{{ route('marcas') }}">Marcas</a>
            <a class="link" href="{{ route('modelos') }}">Modelos</a>
        </nav>
    </header>


    @yield('content')
    @livewireScripts
</body>
</html>