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
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id('id_tratamiento');
            $table->foreignId('id_paciente')->constrained('pacientes', 'id_paciente');
            $table->foreignId('id_fisioterapeuta')->constrained('fisioterapeutas', 'id_fisioterapeuta');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('objetivo_tratamiento')->nullable();
            $table->string('estado', 50)->default('Activo');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tratamientos');
    }
};
