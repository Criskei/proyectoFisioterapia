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

    protected $fillable = [
        'id_paciente',
        'profesional_registro',
        'tipo_historia',
        'fecha_registro',
        'motivo_consulta',
        'diagnostico_medico',
        'medicamentos',
        'examenes_complementarios',
    ];

    public function pacientes()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }

    public function fisioterapeutas()
    {
        return $this->belongsTo(Fisioterapeuta::class, 'profesional_registro', 'id_fisioterapeuta');
    }

    public function historias_clinicas_neurologicas()
    {
        return $this->hasOne(HistoriasClinicasNeurologica::class, 'id_historia', 'id_historia');
    }

    public function historias_clinicas_fracturas()
    {
        return $this->hasOne(HistoriasClinicasFractura::class, 'id_historia', 'id_historia');
    }

    public function historias_clinicas_miembros_inferiores()
    {
        return $this->hasOne(HistoriasClinicasMiembrosInferior::class, 'id_historia', 'id_historia');
    }

    public function historias_clinicas_posturales()
    {
        return $this->hasOne(HistoriasClinicasPostural::class, 'id_historia', 'id_historia');
    }

    public function evaluaciones_dolores()
    {
        return $this->hasOne(EvaluacionesDolor::class, 'id_historia', 'id_historia');
    }
    
}
