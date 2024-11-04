<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Lecturas extends Model
{
    use HasFactory;

    protected $fillable = [
        'generador_id',
        'fecha',
    ];

    // Relación con el modelo de Generador
    public function generador()
    {
        return $this->belongsTo(Generadores::class, 'generador_id');
    }

    // Relación con el modelo de Parámetros a través de una tabla pivote
    public function parametros()
    {
        return $this->belongsToMany(Parametros::class, 'lectura_parametro')
                    ->withPivot('valor')
                    ->withTimestamps();
    }

    // Relación con el modelo de Usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
