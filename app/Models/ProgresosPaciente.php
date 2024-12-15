<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresosPaciente extends Model
{
    protected $table = 'progresos_pacientes';
    protected $primaryKey = 'id_progreso';
    use HasFactory;

    public function tratamiento_ejercicio()
    {
        return $this->belongsTo(TratamientosEjercicio::class, 'id_tratamiento_ejercicio', 'id_tratamiento_ejercicio');
    }

    public function reconocimiento_corporal()
    {
        return $this->hasOne(ReconocimientosCorporal::class, 'id_progreso', 'id_progreso');
    }
    
}
