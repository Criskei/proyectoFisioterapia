<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fisioterapeuta extends Model
{
    protected $table = 'fisioterapeutas';
    protected $primaryKey = 'id_fisioterapeuta';
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    public function tratamientos()
    {
        return $this->hasMany(tratamiento::class, 'id_fisioterapeuta', 'id_fisioterapeuta');
    }

    public function citas()
    {
        return $this->hasMany(cita::class, 'id_fisioterapeuta', 'id_fisioterapeuta');
    }
    
}
