<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeSiniestro extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function siniestros()    {
        return $this->hasMany(Siniestro::class);
    }
}
