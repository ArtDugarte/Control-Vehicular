<div class="carta">

    @if($feedback)
        <div class="feedback">{{ $feedback }}</div>
    @endif

    <div class="listado">

        <h3 class="titulo">Listado de Vehiculos</h3>

        <ul class="lista">
            @forelse ($vehiculos as $vehiculo)
                <li class="item">
                    <button title="Consultar" class="nombre" wire:click="setVehiculo({{ $vehiculo->id }})">
                        {{ $vehiculo->placa }}
                    </button>
                
                    <button title="Eliminar" class="eliminar" wire:click="destroy({{ $vehiculo->id }})">
                        ×
                    </button>
                </li>
            @empty
                <p class="vacio">No hay vehiculos registrados</p>
            @endforelse
        </ul>
    </div>

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
            @error('modelo_id') <span class="error">{{ $message }}</span> @enderror

            <label for="">Placa</label>
            <input type="text" wire:model.live="placa">
            @error('placa') <span class="error">{{ $message }}</span> @enderror

            <label for="">Año</label>
            <input type="text" wire:model.live="anio">
            @error('anio') <span class="error">{{ $message }}</span> @enderror

            <label for="">Color</label>
            <input type="text" wire:model.live="color">
            @error('color') <span class="error">{{ $message }}</span> @enderror

            <label for="">Fecha de Ingreso</label>
            <input type="date" wire:model.live="fecha_ingreso">
            @error('fecha_ingreso') <span class="error">{{ $message }}</span> @enderror

            @if($editando)
                <button type="button" wire:click="update({{ $vehiculo_id }})">Editar</button>
            @else
                <button type="button" wire:click="store()">Guardar</button>
            @endif

            <button type="button" wire:click="resetForm()">Limpiar</button>
        </form>
    </div>
</div>

