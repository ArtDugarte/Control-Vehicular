<div class="carta">

    @if($feedback)
        <div class="feedback">{{ $feedback }}</div>
    @endif

    @if($feedbackError)
        <div class="feedback feedback-error">{{ $feedbackError }}</div>
    @endif

    <div class="listado">
        <h3 class="titulo">Listado de Marcas</h3>

        <div class="campo filtrado">
            <label for="filter">Marca</label>
            <input id="filter" type="text" wire:model.live="filter" wire:keyup="setMarcas()" placeholder="Buscar por nombre">
        </div>

        <ul class="lista">
            @forelse ($marcas as $marca)
                <li class="item"> <span class="nombre">{{ $marca->nombre }}</span></li>
            @empty
                <p class="vacio">No hay marcas registradas</p>
            @endforelse
        </ul>
    </div>

    <div class="contenedor">
        <form method="POST" class="formulario">

            <div class="campo">
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" wire:model.live="nombre">
                @error('nombre') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="botones">
                <button type="button" wire:click="resetForm()">Limpiar</button>
                <button type="button" wire:click="store()">Guardar</button>
            </div>

        </form>
    </div>
</div>
