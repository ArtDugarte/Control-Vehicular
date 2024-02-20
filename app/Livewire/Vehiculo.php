<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehiculo as MVehiculo;

class Vehiculo extends Component
{
    public function render()
    {
        $vehiculos = MVehiculo::all();

        return view('livewire.vehiculo', compact('vehiculos'));
    }
}
