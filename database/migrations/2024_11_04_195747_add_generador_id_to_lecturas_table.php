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
        Schema::table('lecturas', function (Blueprint $table) {
            $table->foreignId('generadores_id')->constrained('generadores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lecturas', function (Blueprint $table) {
            $table->dropForeign(['generadores_id']);
            $table->dropColumn('generadores_id');
        });
    }
};
