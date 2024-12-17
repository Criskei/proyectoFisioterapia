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

    public function pacientes()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }
    
}
