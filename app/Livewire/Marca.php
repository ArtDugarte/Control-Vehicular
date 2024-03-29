<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Marca as MMarca;

class Marca extends Component
{
    public $feedback = '';
    public $feedbackError = '';
    public $nombre = '';
    public $filter = '';
    public $marcas = [];

    public function render()
    {
        $marcas = $this->marcas;
        return view('livewire.marca', compact('marcas'));
    }

    public function mount()
    {
        $this->marcas = MMarca::all()->sortBy('nombre');
    }

    public function rules()
    {
        return [
            'nombre' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido',
        ];
    }

    public function resetForm()
    {
        $this->feedback = '';
        $this->feedbackError = '';
        $this->nombre = '';
        $this->filter = '';
        $this->marcas = MMarca::all()->sortBy('nombre');
    }

    public function setMarcas()
    {
        $nombre = strtoupper($this->filter);
        $this->marcas = MMarca::where('nombre', 'like', '%'.$nombre.'%')->get()->sortBy('nombre');
    }

    public function store()
    {
        $this->validate();

        try{
            MMarca::create([
                'nombre' => trim($this->nombre)
            ]);

            $this->resetForm();
            $this->feedback = 'Marca registrada';
        } catch (\Throwable $th){  

            $this->feedback='';
            
            if ($th->errorInfo[1] == 1062) {
                $this->feedbackError = 'Ya existe una marca con ese nombre';
            }else {
                $this->feedbackError = 'Error al registrar la marca';
            }
        }
    }
}
