<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vendedor_id',
        'seguro_id',
        'estado',
        'hora',
        'fecha'
    ];

    protected $attributes = [
        'estado' => 'pendiente'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seguro()
    {
        return $this->belongsTo(Seguro::class);
    }

    public function scopePendiente($query)
    {
        return $query->where('estado', 'pendiente');
    }

    public function scopeEnProgreso($query)
    {
        return $query->where('estado', 'en progreso');
    }

    public function scopeAprobada($query)
    {
        return $query->where('estado', 'aprobada');
    }

    public function scopeDenegada($query)
    {
        return $query->where('estado', 'denegada');
    }
    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }
}
