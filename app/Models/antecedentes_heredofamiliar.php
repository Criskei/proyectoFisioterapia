<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antecedentes_heredofamiliar extends Model
{
    protected $table = 'antecedentes_heredofamiliares';
    protected $primaryKey = 'id_heredofamiliar';

    use HasFactory;

    public function paciente()
    {
        return $this->belongsTo(paciente::class, 'id_paciente', 'id_paciente');
    }
}
