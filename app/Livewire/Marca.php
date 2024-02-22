<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Marca as MMarca;

class Marca extends Component
{
    public $feedback = '';
    public $feedbackError = '';
    public $nombre = '';

    public function render()
    {
        $marcas = MMarca::all() -> sortBy('nombre');
        return view('livewire.marca', compact('marcas'));
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
