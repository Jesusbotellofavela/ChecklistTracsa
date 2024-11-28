<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('lecturaparametro', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lectura_id')->constrained('lecturas')->onDelete('cascade');
            $table->foreignId('parametro_id')->constrained('parametros')->onDelete('cascade');
            $table->decimal('valor', 10, 2); // Valor registrado para el parámetro
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('lecturaparametro');
    }
};
