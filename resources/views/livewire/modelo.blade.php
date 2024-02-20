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
        <label for="">Nombre</label>
        <input type="text" wire:model.live="nombre">
        <button type="button" wire:click="store()">Guardar</button>
        <button type="button" wire:click="resetForm()">Limpiar</button>
    </form>
</div>
