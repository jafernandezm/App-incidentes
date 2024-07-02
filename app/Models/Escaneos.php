<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sitios;

class Escaneos extends Model
{
    use HasFactory;
    //sitio_id, tipo, fecha, resultado
    protected $fillable = [
    'sitio_id',
    'tipo',
    'resultado'
    ];

    public function sitio()
    {
        return $this->belongsTo(Sitios::class);
    }
}
