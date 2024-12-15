<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $table = 'ejercicios';
    protected $primaryKey = 'id_ejercicio';
    use HasFactory;

    public function tipo_ejercicio()
    {
        return $this->belongsTo(TiposEjercicio::class, 'id_tipo_ejercicio', 'id_tipo_ejercicio');
    }

    public function Dificultad()
    {
        return $this->belongsTo(Dificultad::class, 'id_dificultad', 'id_dificultad');
    }

    public function tratamientos()
    {
        return $this->belongsToMany(
            Tratamiento::class, 
            'tratamiento_ejercicios', 
            'id_ejercicio', 
            'id_tratamiento'
        )->withPivot('frecuencia_semanal', 'repeticiones', 'series');
    }

    public function ProgresosPaciente()
    {
        return $this->hasManyThrough(
            ProgresosPaciente::class, 
            TratamientosEjercicio::class, 
            'id_ejercicio', 
            'id_tratamiento_ejercicio', 
            'id_ejercicio', 
            'id_tratamiento_ejercicio'
        );
    }
    
}
