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
        Schema::create('ejercicios_pacientes', function (Blueprint $table) {
            $table->id('ejercicio_paciente_id');
            $table->foreignId('ejercicio_id');
            $table->foreignId('paciente_id');
            $table->foreignId('fisioterapeuta_id');
            $table->integer('repeticiones');
            $table->dateTime('fecha_asignacion');
            $table->dateTime('fecha_limite');
            $table->boolean('activo');

            $table->foreign('ejercicio_id')->references('ejercicio_id')->on('ejercicios');
            $table->foreign('paciente_id')->references('paciente_id')->on('pacientes');
            $table->foreign('fisioterapeuta_id')->references('fisioterapeuta_id')->on('fisioterapeutas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios_pacientes');
    }
};
