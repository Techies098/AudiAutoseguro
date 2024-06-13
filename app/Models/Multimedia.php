<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'tipo', 'dano_menor_id'];

    public function danoMenor()
    {
        return $this->belongsTo(DanoMenor::class);
    }
    
}
