<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntecedentesPerinatal extends Model
{
    protected $table = 'antecedentes_perinatales';
    protected $primaryKey = 'id_perinatal';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'id_paciente',
        'trabajo_parto_caracteristicas',
        'duracion_trabajo_parto',
        'lugar_atencion',
        'metodo_obtencion',
        'complicaciones_extraccion',
        'uso_forceps',
        'incubadora',
        'tiempo_incubadora',
    ];

    public function pacientes()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }
}
