<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Columna extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tablas_id'
    ];

    public function tabla()
    {
        return $this->belongsTo(Tabla::class);
    }
}
