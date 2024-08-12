<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    use HasFactory;
    //tipo, descripcion, fecha, contenido, tipo_id
    protected $fillable = ['tipo_id', 'contenido', 'descripcion', 'fecha'];
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
