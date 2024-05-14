<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [

        'cliente_id',
        'marca',
        'modelo',
        'clase',
        'color',
        'placa',
        'chasis',
        'motor',
        'traccion',
        'anio',
        'uso',
        'nro_asientos',
        'combustible',
        'valor_comercial'

    ];

    //Relaciones
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

}
