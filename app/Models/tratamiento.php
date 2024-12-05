<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tratamiento extends Model
{
    protected $table = 'tratamientos';
    protected $primaryKey = 'id_tratamiento';
    use HasFactory;

    public function paciente()
    {
        return $this->belongsTo(paciente::class, 'id_paciente', 'id_paciente');
    }

    public function fisioterapeuta()
    {
        return $this->belongsTo(fisioterapeuta::class, 'id_fisioterapeuta', 'id_fisioterapeuta');
    }

    public function ejercicios()
    {
        return $this->belongsToMany(
            ejercicio::class, 
            'tratamiento_ejercicios', 
            'id_tratamiento', 
            'id_ejercicio'
        )->withPivot('frecuencia_semanal', 'repeticiones', 'series');
    }
    
}
