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
    public $feedbackError = '';
    public $editando = false;
    public $vehiculo_id = 0;

    public function render()
    {
        $vehiculos = MVehiculo::all() -> sortBy('placa');
        $marcas = MMarca::all();
        $modelos = MModelo::where('marca_id', $this->marca_id)->get();

        return view('livewire.vehiculo', compact('vehiculos', 'marcas', 'modelos'));
    }

    public function mount()
    {
        $this -> fecha_ingreso = date('Y-m-d');
    }

    public function rules()
    {
        return [
            'placa' => 'required|regex:/^[A-Za-z0-9]{6,7}$/',
            'color' => 'required|regex:/^[A-Za-z\s]{3,}$/',
            'anio' => 'required|regex:/^[0-9]{4}$/',
            'fecha_ingreso' => 'required|date|before_or_equal:today',
            'modelo_id' => 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'placa.required' => 'La placa es requerida',
            'placa.regex' => 'La placa debe ser de 6 o 7 caracteres alfanuméricos sin espacios ni guiones',
            'color.required' => 'El color es requerido',
            'color.regex' => 'El color debe ser de 3 o más caracteres alfanuméricos',
            'anio.required' => 'El año es requerido',
            'anio.regex' => 'El año debe ser de 4 dígitos',
            'fecha_ingreso.required' => 'La fecha de ingreso es requerida',
            'fecha_ingreso.before_or_equal' => 'La fecha de ingreso debe ser anterior o igual a la fecha actual',
            'modelo_id.min' => 'El modelo es requerido'
        ];
    }

    public function resetForm() {
        $this->placa = '';
        $this->color = '';
        $this->anio = '';
        $this->fecha_ingreso = date('Y-m-d');
        $this->modelo_id = 0;
        $this->marca_id = 0;
        $this->feedback = '';
        $this->feedbackError = '';
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
        $this->validate();

        try {
            MVehiculo::create([
                'placa' => strtoupper($this->placa),
                'color' => trim($this->color),
                'anio' => trim($this->anio),
                'fecha_ingreso' => $this->fecha_ingreso,
                'modelo_id' => $this->modelo_id
            ]);
            $this->resetForm();
            $this->feedback = 'Vehículo registrado';
        } catch (Exception $e) {
            $this->feedback = '';
            if ($e->getCode() == 23000) {
                $this->feedbackError = 'Ya existe un vehículo registrado con esta placa';
            } else {
                $this->feedbackError = 'No se pudo registrar el vehículo';
            }
        }
    }

    public function update($id)
    {
        $this->validate();

        try {
            $vehiculo = MVehiculo::find($id);

            if ($vehiculo) {
                $vehiculo->placa = strtoupper($this->placa);
                $vehiculo->color = trim($this->color);
                $vehiculo->anio = trim($this->anio);
                $vehiculo->fecha_ingreso = $this->fecha_ingreso;
                $vehiculo->modelo_id = $this->modelo_id;
                $vehiculo->save();
                $this->resetForm();
                $this->feedback = 'Vehículo actualizado';
            }
        } catch (Exception $e) {
            $this->feedback = '';
            if ($e->getCode() == 23000) {
                $this->feedbackError = 'Ya existe un vehículo registrado con esta placa en el sistema';
            } else {
                $this->feedbackError = 'No se pudo actualizar el vehículo';
            }
        }
    }

    public function destroy($id)
    {
        try {
            MVehiculo::destroy($id);
            $this->resetForm();
            $this->feedback = 'Vehículo eliminado';
        } catch (Exception $e) {
            $this->feedback = '';
            $this->feedbackError = 'No se pudo eliminar el vehículo';
        }
    }
}
