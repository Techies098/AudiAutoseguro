<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;

    protected $fillable = [

        'nombre',
        'direccion',
        'telefono',
        'estado'

    ];

    public function danoMenor()
    {
        return $this->hasMany(DanoMenor::class);
    }
}
