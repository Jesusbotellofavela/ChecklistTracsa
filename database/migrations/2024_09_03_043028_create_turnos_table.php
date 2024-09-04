<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
        $table->time('start_time'); // Hora de inicio del turno
        $table->time('end_time'); // Hora de fin del turno
        $table->date('shift_date'); // Fecha del turno
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Relación con operadores (usuarios)
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
