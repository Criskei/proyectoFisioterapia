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
        Schema::create('historias_clinicas_posturales', function (Blueprint $table) {
            $table->foreignId('id_historia')->constrained('historias_clinicas', 'id_historia');
            $table->string('sedestacion', 20)->nullable();
            $table->string('bipedestacion', 20)->nullable();
            $table->text('alteraciones_posturales')->nullable();
            $table->text('objetivos_tratamiento')->nullable();
            $table->text('pronostico')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historias_clinicas_posturales');
    }
};
