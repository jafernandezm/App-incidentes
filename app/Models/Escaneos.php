<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sitios;
use App\Models\Resultados_Escaneos;
class Escaneos extends Model
{
    use HasFactory;
    //escaneo_id, tipo, fecha, resultado
    protected $fillable = [
    'url',
    'escaneo_id',
    'tipo',
    'fecha',
    'resultado'
    ];
    public function resultados()
    {   
        // Relación uno a muchos
        return $this->hasMany(Resultados_Escaneos::class, 'escaneo_id');
    }

 
}
