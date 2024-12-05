<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antecedentes_prenatal extends Model
{
    protected $table = 'antecedentes_prenatales';
    protected $primaryKey = 'id_prenatal';
    use HasFactory;

    public function paciente()
    {
        return $this->belongsTo(paciente::class, 'id_paciente', 'id_paciente');
    }
    
}
