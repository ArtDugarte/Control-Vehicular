<div>

    <h3>Listado de Vehiculos</h3>

    @if (session()->has('feedback'))
        <div>
            {{ session('feedback') }}
        </div>
    @endif

    <ul>
        @forelse ($vehiculos as $vehiculo)
            <li>{{ $vehiculo->placa }}</li>
        @empty
            <p>No hay vehiculos registrados</p>
        @endforelse
    </ul>

    <div>
        <form>
            <label for="">Marcas</label>
            <select wire:model="marca_id" wire:change="setModelos($event.target.value)">
                <option value="0">Seleccione una marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                @endforeach
            </select>
            
            <label for="">Modelos</label>
            <select wire:model="modelo_id">
                <option value="0">Seleccione un modelo</option>
                @foreach ($modelos as $modelo)
                    <option value="{{ $modelo->id }}">{{ $modelo->nombre }}</option>
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

            <button type="button" wire:click="store()">Guardar</button>
        </form>
    </div>
</div>

