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
        $this->nombre = '';
    }

    public function store()
    {

        $this->validate();

        MMarca::create([
            'nombre' => $this->nombre
        ]);
        $this->resetForm();
        $this->feedback = 'Marca registrada';
    }
}
