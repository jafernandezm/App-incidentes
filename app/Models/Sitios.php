<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitios extends Model
{
    use HasFactory;
     //url nombre estado(infectado,limpioS) 

    protected $fillable = [
    'url',
    'nombre',
    'estado'
    ];
    
}
