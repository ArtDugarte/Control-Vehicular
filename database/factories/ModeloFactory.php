<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModeloFactory extends Factory
{
    protected $count = 0;

    private $modelos_mitsubishi = ['Lancer', 'Outlander', 'L200', 'Lancer Evolution', 'Eclipse', 'Nativa', 'Colt'];

    public function definition(): array
    {

        if ($this->count >= count($this->modelos_mitsubishi)) {
            $this->count = 0;
        }

        return [
            'nombre' => $this->modelos_mitsubishi[$this->count++],
            'marca_id' => 1
        ];
    }
}

