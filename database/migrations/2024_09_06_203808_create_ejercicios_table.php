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
        Schema::create('ejercicios', function (Blueprint $table) {
            $table->id('id_ejercicio');
            $table->foreignId('id_tipo_ejercicio')->constrained('tipos_ejercicios', 'id_tipo_ejercicio');
            $table->foreignId('id_dificultad')->constrained('dificultades', 'id_dificultad');
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->text('instrucciones')->nullable();
            $table->string('video_tutorial_url')->nullable()->comment('Ruta en la nube donde se almacena la animación');
            $table->string('imagen_demostracion')->nullable()->comment('Ruta o URL de la imagen');
            $table->integer('duracion_estimada')->nullable()->comment('Duración estimada en minutos');   
            $table->boolean('requiere_supervision')->default(true);         
            $table->boolean('activo')->default(true);
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios');
    }
};
