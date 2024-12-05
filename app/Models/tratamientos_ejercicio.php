<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tratamientos_ejercicio extends Model
{
    protected $table = 'tratamientos_ejercicios';
    protected $primaryKey = 'id_tratamiento_ejercicio';
    use HasFactory;

    public function tratamiento()
    {
        return $this->belongsTo(tratamiento::class, 'id_tratamiento', 'id_tratamiento');
    }

    public function ejercicio()
    {
        return $this->belongsTo(ejercicio::class, 'id_ejercicio', 'id_ejercicio');
    }

    public function progresos_pacientes()
    {
        return $this->hasMany(progresos_paciente::class, 'id_tratamiento_ejercicio', 'id_tratamiento_ejercicio');
    }    
}
