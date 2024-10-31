<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Turnos extends Model
{
    use HasFactory;

    // Definir la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Asegúrate de que los campos sean rellenables
    protected $fillable = [
        'start_time', 'end_time', 'shift_date', 'user_id',
    ];
}
