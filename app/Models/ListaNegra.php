<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaNegra extends Model
{
    use HasFactory;
    // url tipo fecha
    protected $fillable = ['url', 'tipo', 'fecha'];
}
