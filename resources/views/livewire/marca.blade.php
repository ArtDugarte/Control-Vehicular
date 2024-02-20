<div>
    <h3>Listado de Marcas</h3>

    <div>
        {{ $feedback }}
    </div>

    <ul>
        @forelse ($marcas as $marca)
            <li>
                <button wire:click="setMarca({{ $marca->id }})">
                    {{ $marca->nombre }}
                </button>
            </li>
        @empty
            <p>No hay marcas registradas</p>
        @endforelse
    </ul>
</div>
