<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = ['placa', 'color', 'modelo_id', 'fecha_ingreso'];

    protected $casts = [
        'id' => 'integer',
        'placa' => 'string',
        'color' => 'string',
        'modelo_id' => 'integer',
        'fecha_ingreso' => 'date',
    ];
}
