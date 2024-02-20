<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Modelo as MModelo;
use App\Models\Marca as MMarca;

class Modelo extends Component
{

    public $feedback = '';
    public $marcas = [];

    public function render()
    {
        $modelos = MModelo::all();
        $marcas = MMarca::all();
    
        foreach ($modelos as $modelo) {
            $marca = $marcas->where('id', $modelo->marca_id)->first();
            $modelo -> nombre_marca = $marca ? $marca->nombre : 'Sin marca';
        }

        return view('livewire.modelo', compact('modelos', 'marcas'));
    }
}
