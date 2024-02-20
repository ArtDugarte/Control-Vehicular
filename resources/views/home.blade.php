@extends('layouts.app')

@section('title', '| '.$title)

@section('content')

    <h1>{{ $title }}</h1>

    @if( $title == 'Vehiculos' )
        <livewire:vehiculo />
    @endif

    @if( $title == 'Marcas' )
    <livewire:marca />
    @endif

    @if( $title == 'Modelos' )
    <livewire:modelo />
    @endif

@endsection