<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReconocimientosCorporal extends Model
{
    protected $table = 'reconocimientos_corporales';
    protected $primaryKey = 'id_reconocimiento';

    public function progresos_pacientes()
    {
        return $this->belongsTo(ProgresosPaciente::class, 'id_progreso', 'id_progreso');
    } 
    use HasFactory;
}
