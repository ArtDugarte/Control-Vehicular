<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Marca as MMarca;

class Marca extends Component
{
    public $feedback = '';
    public $nombre = '';

    public function render()
    {
        $marcas = MMarca::all();
        return view('livewire.marca', compact('marcas'));
    }

    public function resetForm()
    {
        $this->feedback = '';
        $this->nombre = '';
    }

    public function store()
    {
        MMarca::create([
            'nombre' => $this->nombre
        ]);
        $this->resetForm();
        $this->feedback = 'Marca registrada';
    }
}
