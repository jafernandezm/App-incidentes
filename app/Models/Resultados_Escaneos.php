<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Escaneos;
class Resultados_Escaneos extends Model
{
    use HasFactory;
     //escaneo_id, detalle, tipo
    protected $fillable = [
    'escaneo_id',
    'detalle',
    'tipo'
    ];

    public function escaneo()
    {
        return $this->belongsTo(Escaneos::class);
    }
}
