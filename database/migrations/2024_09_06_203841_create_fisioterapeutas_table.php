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
        Schema::create('fisioterapeutas', function (Blueprint $table) {
            $table->id('id_fisioterapeuta');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario');
            $table->string('especialidad', 100);
            $table->string('cedula_profesional', 50)->nullable();
            $table->date('fecha_graduacion')->nullable();
            $table->boolean('activo')->default(true);             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fisioterapeutas');
    }
};
