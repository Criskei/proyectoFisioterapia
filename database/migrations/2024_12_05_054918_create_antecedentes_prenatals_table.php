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
        Schema::create('antecedentes_prenatales', function (Blueprint $table) {
            $table->id('id_prenatal');
            $table->foreignId('id_paciente')->constrained('pacientes', 'id_paciente');
            $table->integer('gesta')->nullable();
            $table->integer('para')->nullable();
            $table->integer('cesarea')->nullable();
            $table->integer('abortos')->nullable();
            $table->integer('edad_madre_embarazo')->nullable();
            $table->integer('semanas_gestacion')->nullable();
            $table->boolean('control_prenatal')->nullable();
            $table->string('profesional_control', 100)->nullable();
            $table->text('complicaciones')->nullable();
            $table->text('alimentacion')->nullable();
            $table->text('traumatismos')->nullable();
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedentes_prenatales');
    }
};
