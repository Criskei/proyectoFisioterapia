<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $table = 'tratamientos';
    protected $primaryKey = 'id_tratamiento';
    use HasFactory;

    public function Paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }

    public function Fisioterapeuta()
    {
        return $this->belongsTo(Fisioterapeuta::class, 'id_fisioterapeuta', 'id_fisioterapeuta');
    }

    public function ejercicios()
    {
        return $this->belongsToMany(
            Ejercicio::class, 
            'tratamiento_ejercicios', 
            'id_tratamiento', 
            'id_ejercicio'
        )->withPivot('frecuencia_semanal', 'repeticiones', 'series');
    }
    
}
