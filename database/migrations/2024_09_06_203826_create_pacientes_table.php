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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id('id_paciente');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->string('tutor_nombre', 100)->nullable();
            $table->string('tutor_parentesco', 50)->nullable();
            $table->date('fecha_ingreso');
            $table->string('escolaridad', 100)->nullable();
            $table->text('observaciones_generales')->nullable();
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
