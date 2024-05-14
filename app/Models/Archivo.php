<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', // Nombre del archivo
        'ruta', // Ruta relativa o URL al archivo
        'tipo', // Tipo de archivo (por ejemplo, 'pdf', 'jpg', 'png')
    ];
    public function siniestro()    {
        return $this->belongsTo(Siniestro::class);
    }

    // Otros métodos, atributos, relaciones, etc.
}
