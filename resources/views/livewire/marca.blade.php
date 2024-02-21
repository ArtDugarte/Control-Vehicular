<div>
    <h3>Listado de Marcas</h3>

    <div>
        {{ $feedback }}
    </div>

    <ul>
        @forelse ($marcas as $marca)
            <li>{{ $marca->nombre }}</li>
        @empty
            <p>No hay marcas registradas</p>
        @endforelse
    </ul>

    <form method="POST">
        <label for="">Nombre</label>
        <input type="text" wire:model.live="nombre">
        @error('nombre') <span class="error">{{ $message }}</span> @enderror
        <button type="button" wire:click="store()">Guardar</button>
        <button type="button" wire:click="resetForm()">Limpiar</button>
    </form>
</div>
