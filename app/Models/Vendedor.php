<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $table = 'vendedores';
    protected $fillable = ['user_id'];

    //Relaciones
    public function user(){
        return $this->belongsTo(User::class);
    }

}
