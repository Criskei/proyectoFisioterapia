<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntecedentesPrenatal extends Model
{
    protected $table = 'antecedentes_prenatales';
    protected $primaryKey = 'id_prenatal';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'id_paciente',
        'gesta',
        'para',
        'cesarea' ,
        'abortos' ,
        'edad_madre_embarazo' ,
        'semanas_gestacion' ,
        'control_prenatal' ,
        'profesional_control' ,
        'complicaciones',
        'alimentacion' ,
        'traumatismos',
    ];

    public function pacientes()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }
}
