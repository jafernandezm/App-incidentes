<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Html_infectado extends Model
{
    use HasFactory;
    protected $fillable = [
    'html_infectado',
    'descripcion'
    ];

    
}
