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
        Schema::create('reconocimientos_corporales', function (Blueprint $table) {
            $table->id('id_reconocimiento');
            $table->foreignId('id_progreso')->constrained('progresos_pacientes', 'id_progreso');
            $table->binary('imagen_capturada')->nullable();
            $table->json('puntos_clave_json')->nullable();
            $table->text('resultado_analisis')->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->boolean('activo')->default(true);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reconocimientos_corporales');
    }
};
