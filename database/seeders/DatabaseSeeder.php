<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(MarcaSeeder::class);
        $this->call(ModeloSeeder::class);
        $this->call(VehiculoSeeder::class);
    }
}
