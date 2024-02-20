<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255)->unique();
            $table->unsignedBigInteger('marca_id')->required();
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modelos');
    }
};

