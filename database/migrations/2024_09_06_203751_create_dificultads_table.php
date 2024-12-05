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
        Schema::create('dificultades', function (Blueprint $table) {
            $table->id('id_dificultad');
            $table->integer('nivel')->comment('Nivel de dificultad (1: Fácil, 2: Medio, 3: Difícil)');
            $table->text('descripcion')->nullable();            
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dificultades');
    }
};
