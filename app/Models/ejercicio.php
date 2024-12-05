<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ejercicio extends Model
{
    protected $table = 'ejercicios';
    protected $primaryKey = 'id_ejercicio';
    use HasFactory;

    public function tipo_ejercicio()
    {
        return $this->belongsTo(tipos_ejercicio::class, 'id_tipo_ejercicio', 'id_tipo_ejercicio');
    }

    public function dificultad()
    {
        return $this->belongsTo(dificultad::class, 'id_dificultad', 'id_dificultad');
    }

    public function tratamientos()
    {
        return $this->belongsToMany(
            tratamiento::class, 
            'tratamiento_ejercicios', 
            'id_ejercicio', 
            'id_tratamiento'
        )->withPivot('frecuencia_semanal', 'repeticiones', 'series');
    }

    public function progresos_paciente()
    {
        return $this->hasManyThrough(
            progresos_paciente::class, 
            tratamientos_ejercicio::class, 
            'id_ejercicio', 
            'id_tratamiento_ejercicio', 
            'id_ejercicio', 
            'id_tratamiento_ejercicio'
        );
    }
    
}
