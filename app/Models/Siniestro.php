<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siniestro extends Model
{
    use HasFactory;
    protected $table = 'siniestros'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'contrato_id',
        'detalle',
        'estado',
        'estado_ebriedad',
        'monto_siniestro',
        'porcentaje_danio',
        'porcentajeCulpabilidad',
        'ubicacion',
    ];
    public function tipoDeSiniestro()    {
        return $this->belongsTo(TipoDeSiniestro::class);
    }
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

