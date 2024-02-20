<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 7)->unique()->required();
            $table->year('anio', 4)->required();
            $table->string('color', 255)->required();
            $table->unsignedBigInteger('modelo_id')->required();
            $table->foreign('modelo_id')->references('id')->on('modelos')->onDelete('cascade');
            $table->date('fecha_ingreso');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
