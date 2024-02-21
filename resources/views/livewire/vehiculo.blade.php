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

    <div class="contenedor">
        <form method="POST" class="formulario">

            <div class="campo">
                <label for="marcas">Marcas</label>
                <select id="marcas" wire:model.live="marca_id" wire:change="setModelos($event.target.value)">
                    <option value="0">Seleccione una marca</option>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                    @endforeach
                </select>
            </div>

            
            <div class="campo">
                <label for="">Modelos</label>
                <select wire:model.live="modelo_id">
                    <option value="0">Seleccione un modelo</option>
                    @foreach ($modelos as $modelo)
                        <option {{ $modelo->id == $modelo_id ? 'selected' : '' }} value="{{ $modelo->id }}">{{ $modelo->nombre }}</option>
                    @endforeach
                </select>
                @error('modelo_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            
            <div class="campo">
                <label for="">Placa</label>
                <input type="text" wire:model.live="placa">
                @error('placa') <span class="error">{{ $message }}</span> @enderror
            </div>

            
            <div class="campo">
                <label for="">Año</label>
                <input type="text" wire:model.live="anio">
                @error('anio') <span class="error">{{ $message }}</span> @enderror
            </div>

            
            <div class="campo">
                <label for="">Color</label>
                <input type="text" wire:model.live="color">
                @error('color') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="campo">
                <label for="">Fecha de Ingreso</label>
                <input type="date" wire:model.live="fecha_ingreso" max="{{ date('Y-m-d') }}">
                @error('fecha_ingreso') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="botones">
                <button type="button" wire:click="resetForm()">Limpiar</button>

                @if($editando)
                    <button type="button" wire:click="update({{ $vehiculo_id }})">Editar</button>
                @else
                    <button type="button" wire:click="store()">Guardar</button>
                @endif
            </div>
            
        </form>
    </div>
</div>

