<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Parametros extends Model
{
    use HasFactory;

// Agrega el campo 'generadores_id' aquí
protected $fillable = [
    'generadores_id', // Asegúrate de incluir este campo
    'parameter_name',
    'unit',
    'min_value',
    'max_value',
];
public function lecturas()
{
    return $this->belongsToMany(Lecturas::class, 'lecturaparametro', 'parametro_id', 'lectura_id')
                ->withPivot('valor') // Campo adicional en la tabla pivote
                ->withTimestamps();
}

}
