<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehiculo as MVehiculo;
use App\Models\Marca as MMarca;
use App\Models\Modelo as MModelo;

class Vehiculo extends Component
{
    public $placa = '';
    public $color = '';
    public $anio = '';
    public $fecha_ingreso = '';
    public $modelo_id = 0;
    public $marca_id = 0;
    public $feedback = '';

    public function render()
    {
        $vehiculos = MVehiculo::all();
        $marcas = MMarca::all();
        $modelos = MModelo::where('marca_id', $this->marca_id)->get();

        return view('livewire.vehiculo', compact('vehiculos', 'marcas', 'modelos'));
    }

    public function setModelos($marca_id)
    {
        $this->modelos = MModelo::where('marca_id', $marca_id)->get();
    }

    public function store()
    {
        if($this -> modelo_id == 0) return;

        MVehiculo::create([
            'placa' => $this -> placa,
            'color' => $this -> color,
            'anio' => $this -> anio,
            'fecha_ingreso' => $this -> fecha_ingreso,
            'modelo_id' => $this -> modelo_id
        ]);

        $this -> feedback = 'Vehículo registrado';
    }
}
