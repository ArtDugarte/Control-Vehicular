<div class="carta">

    @if($feedback)
        <div class="feedback">{{ $feedback }}</div>
    @endif

    @if($feedbackError)
        <div class="feedback feedback-error">{{ $feedbackError }}</div>
    @endif

    <div class="listado">

        <h3 class="titulo">Listado de Modelos</h3>

        <div class="campo filtrado">
            <label for="filter">Modelo</label>
            <input id="filter" type="text" wire:model.live="filter" wire:keyup="setModelos()" placeholder="Buscar por nombre">
        </div>

        <ul class="lista">
            @forelse ($modelos as $modelo)
                <li class="item"><span class="nombre">{{ $modelo->nombre }} ({{ $modelo->nombre_marca }})</span></li>
            @empty
                <p class="vacio">No hay modelos registradas</p>
            @endforelse
        </ul>
    </div>
    
    <div class="contenedor">
        <form method="POST" class="formulario">

            <div class="campo">
                <label for="marcas">Marcas</label>
                <select id="marcas" wire:model.live="marca_id">
                    <option value="0">Seleccione una marca</option>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                    @endforeach
                </select>
                @error('marca_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            
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
