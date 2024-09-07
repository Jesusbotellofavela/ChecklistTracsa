<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Generadores extends Model
{
    use HasFactory;

    // Definir la tabla si el nombre no sigue el estándar "plural"
    protected $table = 'generadores';

    // Si hay campos que no deben ser asignables en masa, protégelos
    protected $guarded = ['id'];

}
