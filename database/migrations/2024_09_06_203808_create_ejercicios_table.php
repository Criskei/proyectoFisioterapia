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
        Schema::create('ejercicios', function (Blueprint $table) {
            $table->id('ejercicio_id');
            $table->foreignId('tipo_ejercicio_id');
            $table->foreignId('dificultad_id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('url');
            $table->string('duracion');
            $table->boolean('activo');

            $table->foreign('tipo_ejercicio_id')->references('tipo_ejercicio_id')->on('tipos_ejercicios');
            $table->foreign('dificultad_id')->references('dificultad_id')->on('dificultades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios');
    }
};
