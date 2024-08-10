<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Escaneos;
class datos_filtrados extends Model
{
    use HasFactory;

    protected $table = 'datos_filtrados';
    protected $fillable = ['consulta', 'tipo', 'filtracion', 'informacion', 'data', 'escaneo_id'];
    public function escaneo()
    {
        return $this->belongsTo(Escaneos::class, 'id');
    }

}
