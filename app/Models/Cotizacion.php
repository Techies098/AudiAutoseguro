<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    protected $table = 'cotizaciones';
    protected $fillable = [
        'seguro_id',
        'name',
        'email',
        'telefono',
        'year',
        'precio',
        'marca',
        'modelo',


    ];
    public function seguro()
    {
        return $this->belongsTo(Seguro::class);
    }
}
