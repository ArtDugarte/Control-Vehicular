<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Modelo as MModelo;
use App\Models\Marca as MMarca;

class Modelo extends Component
{

    public $feedback = '';
    public $marca_id = 0;
    public $nombre = '';

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

    public function resetForm() {
        $this->nombre = '';
        $this->marca_id = 0;
        $this->feedback = '';
    }
    
    public function store()
    {
        MModelo::create([
            'nombre' => $this -> nombre,
            'marca_id' => $this -> marca_id
        ]);
        $this->resetForm();
        $this -> feedback = 'Modelo registrado';
    }
}
