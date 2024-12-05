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
        Schema::create('progresos_pacientes', function (Blueprint $table) {
            $table->id('id_progreso');
            $table->foreignId('id_tratamiento_ejercicio')->constrained('tratamientos_ejercicios', 'id_tratamiento_ejercicio');
            $table->date('fecha_realizacion');
            $table->integer('repeticiones_realizadas');
            $table->decimal('calidad_ejecucion', 4, 2)->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progresos_pacientes');
    }
};
