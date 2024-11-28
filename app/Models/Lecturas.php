<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Lecturas extends Model
{
    use HasFactory;

    protected $fillable = ['generador_id', 'user_id', 'fecha'];


    protected $casts = [
        'fecha' => 'datetime',
    ];

    // Relación con el modelo Generadores
    public function generador()
    {
        return $this->belongsTo(Generadores::class, 'generador_id');
    }

    // Relación con el modelo Parametros usando una tabla pivote
    public function parametros()
    {
        return $this->belongsToMany(Parametros::class, 'lecturaparametro', 'lectura_id', 'parametro_id')
                    ->withPivot('valor') // Campo adicional en la tabla pivote
                    ->withTimestamps();
    }
    // Relación con el modelo Usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
