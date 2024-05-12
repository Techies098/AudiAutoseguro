<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_prima'
    ];

    //relacion de muchos a muchos
    public function cobertura(){
    return $this->belongsToMany('App\Models\Cobertura');
    }

    //relacion de muchos a muchos
    public function clausula(){
    return $this->belongsToMany('App\Models\Clausula');
    }
    public function cotizacion()
    {
        return $this->hasMany(Cotizacion::class);
    }
}

