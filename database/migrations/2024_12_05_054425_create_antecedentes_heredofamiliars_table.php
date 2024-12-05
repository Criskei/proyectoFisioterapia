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
        Schema::create('antecedentes_heredofamiliares', function (Blueprint $table) {
            $table->id('id_heredofamiliar');
            $table->foreignId('id_paciente')->constrained('pacientes', 'id_paciente');
            $table->text('descripcion')->nullable();
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedentes_heredofamiliares');
    }
};
