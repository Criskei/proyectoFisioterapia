<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    public function antecedentes_heredofamiliares()
    {
        return $this->hasMany(antecedentes_heredofamiliar::class, 'id_paciente', 'id_paciente');
    }

    public function antecedente_prenatal()
    {
        return $this->hasOne(antecedentes_prenatal::class, 'id_paciente', 'id_paciente');
    }

    public function antecedente_perinatal()
    {
        return $this->hasOne(antecedentes_perinatal::class, 'id_paciente', 'id_paciente');
    }

    public function historias_clinicas()
    {
        return $this->hasMany(historias_clinica::class, 'id_paciente', 'id_paciente');
    }

    public function tratamientos()
    {
        return $this->hasMany(tratamiento::class, 'id_paciente', 'id_paciente');
    }

    public function citas()
    {
        return $this->hasMany(cita::class, 'id_paciente', 'id_paciente');
    }
}
