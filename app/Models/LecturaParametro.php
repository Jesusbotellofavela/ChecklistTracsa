<?php

namespace App\Models;
use App\Models\Lecturas as Lectura;
use App\Models\Parametros as Parametro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturaParametro extends Model
{
    use HasFactory;

    protected $table = 'lecturaparametro';

    protected $fillable = [
        'lecturas_id',
        'parametros_id',
        'valor',
    ];

    /**
     * Relación con el modelo Lectura.
     */
    public function lectura()
    {
        return $this->belongsTo(Lectura::class);
    }

    /**
     * Relación con el modelo Parametro.
     */
    public function parametro()
    {
        return $this->belongsTo(Parametro::class);
    }
}
