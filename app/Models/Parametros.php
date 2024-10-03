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
}
