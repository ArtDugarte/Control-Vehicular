<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Marca as MMarca;

class Marca extends Component
{
    public $feedback = '';

    public function render()
    {
        $marcas = MMarca::all();
        return view('livewire.marca', compact('marcas'));
    }
}
