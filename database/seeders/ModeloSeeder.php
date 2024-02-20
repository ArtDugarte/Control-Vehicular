<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Modelo;

class ModeloSeeder extends Seeder
{
    public function run(): void
    {
        Modelo::factory(7)->create();
    }
}
