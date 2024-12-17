<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TratamientosEjercicio extends Model
{
    protected $table = 'tratamientos_ejercicios';
    protected $primaryKey = 'id_tratamiento_ejercicio';
    use HasFactory;

    public function tratamientos()
    {
        return $this->belongsTo(Tratamiento::class, 'id_tratamiento', 'id_tratamiento');
    }

    public function ejercicios()
    {
        return $this->belongsTo(Ejercicio::class, 'id_ejercicio', 'id_ejercicio');
    }

    public function progresos_pacientes()
    {
        return $this->hasMany(ProgresosPaciente::class, 'id_tratamiento_ejercicio', 'id_tratamiento_ejercicio');
    }    
}
