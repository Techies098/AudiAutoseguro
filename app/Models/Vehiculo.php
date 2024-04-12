<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cliente',
        'placa',
        'clase',
        'marca',
        'modelo',
        'anio',
        'color',
        'nro_asientos'
    ];
}
