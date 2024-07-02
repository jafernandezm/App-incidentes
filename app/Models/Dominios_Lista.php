<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dominios_Lista extends Model
{
    use HasFactory;
   // url ,tipo, fecha_adicion
    protected $fillable = [
        'url',
        'tipo',
    ];
    
}
