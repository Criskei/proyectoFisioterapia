<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reconocimientos_corporal extends Model
{
    protected $table = 'reconocimientos_corporales';
    protected $primaryKey = 'id_reconocimiento';

    public function progreso_paciente()
    {
        return $this->belongsTo(progresos_paciente::class, 'id_progreso', 'id_progreso');
    } 
    use HasFactory;
}
