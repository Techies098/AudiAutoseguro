<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'placa',
        'clase',
        'marca',
        'modelo',
        'anio',
        'color',
        'nro_asientos'
    ];

    //Relaciones
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }
        //relacion de muchos a muchos
        public function seguros(){
            return $this->belongsToMany('App\Models\Seguro');
        }

}
