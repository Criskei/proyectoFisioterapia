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
        Schema::create('tratamientos_ejercicios', function (Blueprint $table) {
            $table->id('id_tratamiento_ejercicio');
            $table->foreignId('id_tratamiento')->constrained('tratamientos', 'id_tratamiento');
            $table->foreignId('id_ejercicio')->constrained('ejercicios', 'id_ejercicio');
            $table->integer('frecuencia_semanal');
            $table->integer('repeticiones');
            $table->integer('series');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tratamientos_ejercicios');
    }
};
