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
        Schema::create('historias_clinicas_fracturas', function (Blueprint $table) {
            $table->foreignId('id_historia')->constrained('historias_clinicas', 'id_historia');
            $table->string('tipo_fractura');
            $table->date('fecha_lesion');
            $table->text('tratamientos_previos')->nullable();
            $table->text('estado_actual')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historias_clinicas_fracturas');
    }
};
