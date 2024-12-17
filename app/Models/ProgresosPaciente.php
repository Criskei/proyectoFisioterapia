<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresosPaciente extends Model
{
    protected $table = 'progresos_pacientes';
    protected $primaryKey = 'id_progreso';
    use HasFactory;

    public function tratamientos_ejercicios()
    {
        return $this->belongsTo(TratamientosEjercicio::class, 'id_tratamiento_ejercicio', 'id_tratamiento_ejercicio');
    }

    public function reconocimientos_corporales()
    {
        return $this->hasOne(ReconocimientosCorporal::class, 'id_progreso', 'id_progreso');
    }
    
}
