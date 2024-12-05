<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    protected $table = 'citas';
    protected $primaryKey = 'id_cita';

    public function paciente()
    {
        return $this->belongsTo(paciente::class, 'id_paciente', 'id_paciente');
    }

    public function fisioterapeuta()
    {
        return $this->belongsTo(fisioterapeuta::class, 'id_fisioterapeuta', 'id_fisioterapeuta');
    }
    use HasFactory;
}
