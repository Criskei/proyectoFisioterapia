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
        Schema::create('historias_clinicas_miembros_inferiores', function (Blueprint $table) {
            $table->foreignId('id_historia')->constrained('historias_clinicas', 'id_historia');
            $table->decimal('longitud_real_derecha', 5, 2)->nullable();
            $table->decimal('longitud_real_izquierda', 5, 2)->nullable();
            $table->decimal('longitud_aparente_derecha', 5, 2)->nullable();
            $table->decimal('longitud_aparente_izquierda', 5, 2)->nullable();
            $table->text('observaciones_rodilla')->nullable();
            $table->text('observaciones_tobillo')->nullable();
            $table->text('analisis_marcha')->nullable();
            $table->string('tipo_pie', 50)->nullable();
            $table->binary('huella_plantar')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historias_clinicas_miembros_inferiores');
    }
};
