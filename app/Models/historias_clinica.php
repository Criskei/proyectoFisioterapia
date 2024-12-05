<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historias_clinica extends Model
{
    protected $table = 'historias_clinicas';
    protected $primaryKey = 'id_historia';
    use HasFactory;

    public function paciente()
    {
        return $this->belongsTo(paciente::class, 'id_paciente', 'id_paciente');
    }

    public function fisioterapeuta()
    {
        return $this->belongsTo(fisioterapeuta::class, 'profesional_registro', 'id_fisioterapeuta');
    }

    public function historia_clinica_neurologica()
    {
        return $this->hasOne(historias_clinicas_neurologica::class, 'id_historia', 'id_historia');
    }

    public function historia_clinica_fractura()
    {
        return $this->hasOne(historias_clinicas_fractura::class, 'id_historia', 'id_historia');
    }

    public function historia_clinica_miembro_inferior()
    {
        return $this->hasOne(historias_clinicas_miembros_inferior::class, 'id_historia', 'id_historia');
    }

    public function historia_clinica_postural()
    {
        return $this->hasOne(historias_clinicas_postural::class, 'id_historia', 'id_historia');
    }

    public function evaluacion_dolor()
    {
        return $this->hasOne(evaluaciones_dolor::class, 'id_historia', 'id_historia');
    }
    
}
