<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dorks extends Model
{
    use HasFactory;
    // dork, fecha
    protected $fillable = ['dork', 'fecha'];
}
