<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudAux extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vendedor_id',
        'auxilio_id',
        'estado',
        'hora',
        'fecha',
        'ubicacion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function auxilio()
    {
        return $this->belongsTo(Auxilio::class);
    }
}
