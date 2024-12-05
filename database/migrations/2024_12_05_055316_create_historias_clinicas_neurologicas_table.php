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
        Schema::create('historias_clinicas_neurologicas', function (Blueprint $table) {            
            $table->foreignId('id_historia')->constrained('historias_clinicas', 'id_historia');
            $table->json('desarrollo_motor_fino')->nullable();
            $table->json('desarrollo_motor_grueso')->nullable();
            $table->json('desarrollo_lenguaje')->nullable();
            $table->text('antecedentes_patologicos')->nullable();
            $table->json('exploracion_neurologica')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historias_clinicas_neurologicas');
    }
};
