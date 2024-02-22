<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

class VehiculoFactory extends Factory
{   

    private $colores = ['Rojo', 'Azul', 'Verde', 'Blanco', 'Negro', 'Gris'];

    public function definition(): array
    {

        $currentYear = Date::now()->year;

        return [
            'placa' => strtoupper(fake()->unique()->bothify('???####')),
            'anio' => fake()->numberBetween(1985, $currentYear),
            'color' => fake()->randomElement($this->colores),
            'fecha_ingreso' => fake()->dateTimeBetween('-1 year', 'now'),
            'modelo_id' => random_int(1, 7),
        ];
    }
}
