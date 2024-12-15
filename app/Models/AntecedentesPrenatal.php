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

    public function Paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }
    
}
