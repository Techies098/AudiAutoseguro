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


    public function cotizacion()
    {
        return $this->hasMany(Cotizacion::class);
    }
    public function cobertura()
    {
        return $this->belongsToMany(Cobertura::class);
    }
    public function contratos()
    {
        return $this->hasmany(Contrato::class);
    }

    public function clausula()
    {
        return $this->belongsToMany(Clausula::class);
    }

    public function contrato()
    {
        return $this->hasMany(Contrato::class);
    }


}

