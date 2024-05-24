<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'monto',
        'fecha_por_pagar',
        'fecha_pagada',
        'contrato_id'
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

}
