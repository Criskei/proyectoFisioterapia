<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $primaryKey = 'id_cita';

    public function Paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }

    public function Fisioterapeuta()
    {
        return $this->belongsTo(Fisioterapeuta::class, 'id_fisioterapeuta', 'id_fisioterapeuta');
    }
    use HasFactory;
}
