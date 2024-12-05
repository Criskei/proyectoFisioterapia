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
        Schema::create('antecedentes_perinatales', function (Blueprint $table) {
            $table->id('id_perinatal');
            $table->foreignId('id_paciente')->constrained('pacientes', 'id_paciente');
            $table->text('trabajo_parto_caracteristicas')->nullable();
            $table->integer('duracion_trabajo_parto')->nullable();
            $table->string('lugar_atencion', 200)->nullable();
            $table->string('metodo_obtencion', 100)->nullable();
            $table->text('complicaciones_extraccion')->nullable();
            $table->boolean('uso_forceps')->nullable();
            $table->boolean('incubadora')->nullable();
            $table->integer('tiempo_incubadora')->nullable();
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedentes_perinatales');
    }
};
