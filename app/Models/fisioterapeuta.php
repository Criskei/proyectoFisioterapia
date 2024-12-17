<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fisioterapeuta extends Model
{
    protected $table = 'fisioterapeutas';
    protected $primaryKey = 'id_fisioterapeuta';
    public $timestamps = false;
    use HasFactory;

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class, 'id_fisioterapeuta', 'id_fisioterapeuta');
    }

    public function citas()
    {
        return $this->hasMany(cita::class, 'id_fisioterapeuta', 'id_fisioterapeuta');
    }
    
}
