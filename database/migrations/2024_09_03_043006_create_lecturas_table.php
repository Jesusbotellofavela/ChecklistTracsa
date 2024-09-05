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
        Schema::create('lecturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parametros_id')->constrained('parametros')->onDelete('cascade'); // Relación con parámetros
            $table->foreignId('turnos_id')->constrained('turnos')->onDelete('cascade'); // Relación con turnos
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con el operador (usuario)
            $table->decimal('value', 10, 2); // Valor registrado
            $table->timestamp('reading_time'); // Hora de la lectura
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturas');
    }
};
