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
        Schema::create('evaluaciones_dolores', function (Blueprint $table) {
            $table->id('id_dolor');
            $table->foreignId('id_historia')->constrained('historias_clinicas', 'id_historia');
            $table->date('fecha_inicio');
            $table->integer('escala_eva');
            $table->text('zona_dolor');
            $table->text('aparicion')->nullable();
            $table->text('localizacion')->nullable();
            $table->text('caracteristicas')->nullable();
            $table->text('irradiacion')->nullable();
            $table->text('atenuantes')->nullable();
            $table->text('agravantes')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluaciones_dolores');
    }
};
