<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Escaneos;
class Resultados_Escaneos extends Model
{
    use HasFactory;
     //URL, Tipo, HTML Infectado , Detalles del HTML, URL Infectada, redirecciones
    protected $fillable = [
    'url',
    'infectada',
    'html_infectado',
    'html',
    'redirecciones',
    'detalle',
    'tipo'
    ];
    public function escaneo()
    {
        //un escaneo tiene muchos resultados
        return $this->belongsTo(Escaneos::class, 'escaneo_id');
    }
  

}
