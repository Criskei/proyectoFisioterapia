<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposEjercicio extends Model
{
    protected $table = 'tipos_ejercicios';
    protected $primaryKey = 'id_tipo_ejercicio';
    public $timestamps = false;
    use HasFactory;

    public function ejercicios()
    {
        return $this->hasMany(Ejercicio::class, 'id_tipo_ejercicio', 'id_tipo_ejercicio');
    }
    
}
