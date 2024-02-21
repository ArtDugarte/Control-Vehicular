<div>
    <h3>Listado de Modelos</h3>

    <div>
        {{ $feedback }}
    </div>

    <ul>
        @forelse ($modelos as $modelo)
            <li>{{ $modelo->nombre_marca }}  {{ $modelo->nombre }}</li>
        @empty
            <p>No hay modelos registradas</p>
        @endforelse
    </ul>

    <form method="POST">

        
        <label for="">Marcas</label>
        <select wire:model.live="marca_id">
            <option value="0">Seleccione una marca</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
            @endforeach
        </select>
        @error('marca_id') <span class="error">{{ $message }}</span> @enderror

        <label for="">Nombre</label>
        <input type="text" wire:model.live="nombre">
        @error('nombre') <span class="error">{{ $message }}</span> @enderror
        
        <button type="button" wire:click="store()">Guardar</button>
        <button type="button" wire:click="resetForm()">Limpiar</button>
    </form>
</div>
