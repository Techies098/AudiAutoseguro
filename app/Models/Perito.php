<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perito extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];


    //Relaciones
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function siniestros()
    {
        return $this->hasMany(Siniestro::class);
    }

}
