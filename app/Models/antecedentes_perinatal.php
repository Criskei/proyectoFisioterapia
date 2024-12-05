<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antecedentes_perinatal extends Model
{
    protected $table = 'antecedentes_perinatales';
    protected $primaryKey = 'id_perinatal';
    use HasFactory;

    public function paciente()
    {
        return $this->belongsTo(paciente::class, 'id_paciente', 'id_paciente');
    }
    
}
