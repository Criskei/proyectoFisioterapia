<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriasClinica extends Model
{
    protected $table = 'historias_clinicas';
    protected $primaryKey = 'id_historia';
    public $timestamps = false;
    use HasFactory;

    public function Paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }

    public function Fisioterapeuta()
    {
        return $this->belongsTo(Fisioterapeuta::class, 'profesional_registro', 'id_fisioterapeuta');
    }

    public function historia_clinica_neurologica()
    {
        return $this->hasOne(HistoriasClinicasNeurologica::class, 'id_historia', 'id_historia');
    }

    public function historia_clinica_fractura()
    {
        return $this->hasOne(HistoriasClinicasFractura::class, 'id_historia', 'id_historia');
    }

    public function historia_clinica_miembro_inferior()
    {
        return $this->hasOne(HistoriasClinicasMiembrosInferior::class, 'id_historia', 'id_historia');
    }

    public function historia_clinica_postural()
    {
        return $this->hasOne(HistoriasClinicasPostural::class, 'id_historia', 'id_historia');
    }

    public function evaluacion_dolor()
    {
        return $this->hasOne(EvaluacionesDolor::class, 'id_historia', 'id_historia');
    }
    
}
