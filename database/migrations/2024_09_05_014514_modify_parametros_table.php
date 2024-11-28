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
        Schema::table('parametros', function (Blueprint $table) {
            $table->decimal('min_value', 10, 2)->nullable()->change();
            // Permitir valores nulos
            $table->decimal('max_value', 10, 2)->nullable()->change();
            // Permitir valores nulos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parametros', function (Blueprint $table) {
            $table->decimal('min_value', 10, 2)->nullable()->change(); // Revertir si es necesario
            $table->decimal('max_value', 10, 2)->nullable()->change(); // Revertir si es necesario
        });
    }
};
