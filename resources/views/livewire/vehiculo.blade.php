<div>
    <ul>
        @forelse ($vehiculos as $vehiculo)
            <li>{{ $vehiculo->placa }}</li>
        @empty
            <p>No hay vehiculos registrados</p>
        @endforelse
    </ul>
</div>

