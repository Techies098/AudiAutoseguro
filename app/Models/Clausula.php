<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clausula extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalle'
    ];
    //relacion de muchos a muchos
    public function seguros(){
    return $this->belongsToMany('App\Models\Seguro');
    }
}
