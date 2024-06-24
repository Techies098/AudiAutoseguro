<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanoMenor extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'detalle', 'estado', 'taller_id', 'contrato_id'];

    public function taller()
    {
        return $this->belongsTo(Taller::class);
    }

    public function multimedia()
    {
        return $this->hasMany(Multimedia::class);
    }

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }


}
