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
    public $editando = false;
    public $vehiculo_id = 0;

    public function render()
    {
        $vehiculos = MVehiculo::all();
        $marcas = MMarca::all();
        $modelos = MModelo::where('marca_id', $this->marca_id)->get();

        return view('livewire.vehiculo', compact('vehiculos', 'marcas', 'modelos'));
    }

    public function resetForm() {
        $this->placa = '';
        $this->color = '';
        $this->anio = '';
        $this->fecha_ingreso = '';
        $this->modelo_id = 0;
        $this->marca_id = 0;
        $this->feedback = '';
        $this->editando = false;
        $this->vehiculo_id = 0;
    }


    public function setModelos($marca_id)
    {  
        $this->marca_id = $marca_id;
        $this->modelos = MModelo::where('marca_id', $marca_id)->get();
        $this->modelo_id = 0;
        
    }

    public function setVehiculo($id)
    {
        $vehiculo = MVehiculo::find($id);

        if ($vehiculo) {
            $this->placa = $vehiculo->placa;
            $this->color = $vehiculo->color;
            $this->anio = $vehiculo->anio;
            $this->fecha_ingreso = $vehiculo->fecha_ingreso->format('Y-m-d');
            $aux = $vehiculo->modelo_id;
            $this->marca_id = MModelo::find($vehiculo->modelo_id)->marca_id;
            $this->modelo_id = $aux;
            $this->editando = true;
            $this->vehiculo_id = $id;
        }
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
        $this->resetForm();
        $this -> feedback = 'Vehículo registrado';
    }

    public function update($id) {
        if($this -> modelo_id == 0) return;

        $vehiculo = MVehiculo::find($id);
        
        if ($vehiculo) {
            $vehiculo->placa = $this -> placa;
            $vehiculo->color = $this -> color;
            $vehiculo->anio = $this -> anio;
            $vehiculo->fecha_ingreso = $this -> fecha_ingreso;
            $vehiculo->modelo_id = $this -> modelo_id;
            $vehiculo->save();
            $this->resetForm();
            $this -> feedback = 'Vehículo actualizado';
        }
    }

    public function destroy($id)
    {
        MVehiculo::destroy($id);
        $this->resetForm();
        $this -> feedback = 'Vehículo eliminado';
    }
}
