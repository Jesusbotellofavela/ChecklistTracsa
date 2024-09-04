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
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('generadores_id')->constrained('generadores')->onDelete('cascade'); // Relación con generadores
            $table->string('parameter_name'); // Nombre del parámetro (ej: Potencia del motor)
            $table->string('unit'); // Unidad de medida (ej: kW, PSI, etc.)
            $table->decimal('min_value', 10, 2); // Valor mínimo
            $table->decimal('max_value', 10, 2); // Valor máximo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametros');
    }
};
