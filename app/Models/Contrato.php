<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [

        'vehiculo_id',
        'vendedor_id',
        'seguro_id',
        'costofranquicia',
        'costoprima',
        'nro_cuotas',
        'tipovigencia',
        'vigenciainicio',
        'vigenciafin',
        'estado'
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function seguro()
    {
        return $this->belongsTo(Seguro::class);
    }

}
