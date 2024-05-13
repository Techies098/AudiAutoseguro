<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siniestro extends Model
{
    protected $table = 'siniestros'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'detalle',
        'Estado',
        'Estado_ebriead',
        'Monto_siniestro',
        'Porcentaje_danio',
        'PorcentajeCulpabilidad',
        'tipo',
        'ubicacion',
        'url_informe',
    ];
    public function contrato()    {
        return $this->belongsTo(Contrato::class);
    }
    public function perito()    {
        return $this->belongsTo(Perito::class);
    }
    public function administrador()    {
        return $this->belongsTo(Administrador::class);
    }
    public function archivos()    {
        return $this->hasMany(Archivo::class);
    }
}

