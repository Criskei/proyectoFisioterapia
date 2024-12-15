<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';
    public $timestamps = false;
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    public function antecedentes_heredofamiliares()
    {
        return $this->hasMany(AntecedentesHeredofamiliar::class, 'id_paciente', 'id_paciente');
    }

    public function antecedente_prenatal()
    {
        return $this->hasOne(AntecedentesPrenatal::class, 'id_paciente', 'id_paciente');
    }

    public function antecedente_perinatal()
    {
        return $this->hasOne(AntecedentesPerinatal::class, 'id_paciente', 'id_paciente');
    }

    public function historias_clinicas()
    {
        return $this->hasMany(HistoriasClinica::class, 'id_paciente', 'id_paciente');
    }

    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class, 'id_paciente', 'id_paciente');
    }

    public function citas()
    {
        return $this->hasMany(cita::class, 'id_paciente', 'id_paciente');
    }
}
