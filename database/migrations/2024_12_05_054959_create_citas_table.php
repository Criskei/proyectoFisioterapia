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
        Schema::create('citas', function (Blueprint $table) {
            $table->id('id_cita');
            $table->foreignId('id_paciente')->constrained('pacientes', 'id_paciente');
            $table->foreignId('id_fisioterapeuta')->constrained('fisioterapeutas', 'id_fisioterapeuta');
            $table->timestamp('fecha_hora');
            $table->integer('duracion_minutos')->default(60);
            $table->text('motivo')->nullable();
            $table->string('estado', 50)->default('Programada');
            $table->text('notas')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
