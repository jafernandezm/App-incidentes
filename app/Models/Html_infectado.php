<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Html_infectado extends Model
{
    use HasFactory;
    //escaneo_id, html_infectado,descripcion
    protected $fillable = [
    //'escaneo_id',
    'html_infectado',
    'descripcion'
    ];

    
}
