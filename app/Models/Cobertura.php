<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobertura extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'limite_cobertura',
        'porcentaje_cobertura'
    ];
    
    public function seguros()
    {
        return $this->belongsToMany('App\Models\Seguro');
    }
}

