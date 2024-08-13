<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sitios;
use App\Models\Resultados_Escaneos;
use App\Models\datos_filtrados;
use Illuminate\Support\Str;

class Escaneos extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['url','tipo','fecha','resultado'
     ,'detalles'];
    public function resultados()
    {   
        // Relación uno a muchos
        return $this->hasMany(Resultados_Escaneos::class, 'escaneo_id');
    }

    //crear la relacioneentre datos filtrados y escaneos
    public function resultado_filtrado(){
        return $this->hasMany(datos_filtrados::class, 'escaneo_id');
    }
      // Generar automáticamente un UUID para 'id' al crear el modelo
      protected static function booted()
      {
          static::creating(function ($model) {
              if (empty($model->id)) {
                  $model->id = (string) Str::uuid();
              }
          });
      }
}
