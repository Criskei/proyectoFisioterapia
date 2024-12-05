<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historias_clinicas', function (Blueprint $table) {
            $table->id('id_historia');
            $table->foreignId('id_paciente')->constrained('pacientes', 'id_paciente');
            $table->foreignId('profesional_registro')->constrained('fisioterapeutas', 'id_fisioterapeuta');
            $table->string('tipo_historia', 50);
            $table->timestamp('fecha_registro')->default(DB::raw('CURRENT_TIMESTAMP'));            
            $table->text('motivo_consulta')->nullable();
            $table->text('diagnostico_medico')->nullable();
            $table->text('medicamentos')->nullable();
            $table->text('examenes_complementarios')->nullable();
            $table->boolean('activo')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historias_clinicas');
    }
};
