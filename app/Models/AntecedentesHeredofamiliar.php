<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntecedentesHeredofamiliar extends Model
{
    protected $table = 'antecedentes_heredofamiliares';
    protected $primaryKey = 'id_heredofamiliar';
    public $timestamps = false;

    use HasFactory;

    public function pacientes()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }
}
