@extends('layouts.app')

@section('title', '| '.$title)

@section('content')

    <div class="contenedor">
        <h2 class="titulo">{{ $title }}</h2>
        
        @if( $title == 'Vehiculos' )
            <livewire:vehiculo />
        @endif

        @if( $title == 'Marcas' )
            <livewire:marca />
        @endif

        @if( $title == 'Modelos' )
            <livewire:modelo />
        @endif
    </div>
@endsection