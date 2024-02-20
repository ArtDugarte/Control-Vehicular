<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehiculo;


class VehiculoSeeder extends Seeder
{
    public function run(): void
    {
        Vehiculo::factory()->count(10)->create();
    }
}
