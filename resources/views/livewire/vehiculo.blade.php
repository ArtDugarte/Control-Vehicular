<div>
    <h3>Listado de Vehiculos</h3>

    <div>
        {{ $feedback }}
    </div>

    <ul>
        @forelse ($vehiculos as $vehiculo)
            <li>
                <button wire:click="setVehiculo({{ $vehiculo->id }})">
                    {{ $vehiculo->placa }}
                </button>
            
                <button wire:click="destroy({{ $vehiculo->id }})">
                    X
                </button>
            </li>
        @empty
            <p>No hay vehiculos registrados</p>
        @endforelse
    </ul>

    <div>
        <form method="POST">
            <label for="">Marcas</label>
            <select wire:model.live="marca_id" wire:change="setModelos($event.target.value)">
                <option value="0">Seleccione una marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                @endforeach
            </select>
            
            <label for="">Modelos</label>
            <select wire:model.live="modelo_id">
                <option value="0">Seleccione un modelo</option>
                @foreach ($modelos as $modelo)
                    <option {{ $modelo->id == $modelo_id ? 'selected' : '' }} value="{{ $modelo->id }}">{{ $modelo->nombre }}</option>
                @endforeach
            </select>

            <label for="">Placa</label>
            <input type="text" wire:model.live="placa">

            <label for="">Año</label>
            <input type="text" wire:model.live="anio">

            <label for="">Color</label>
            <input type="text" wire:model.live="color">

            <label for="">Fecha de Ingreso</label>
            <input type="date" wire:model.live="fecha_ingreso">

            @if($editando)
                <button type="button" wire:click="update({{ $vehiculo_id }})">Editar</button>
            @else
                <button type="button" wire:click="store()">Guardar</button>
            @endif

            <button type="button" wire:click="resetForm()">Limpiar</button>
        </form>
    </div>
</div>

