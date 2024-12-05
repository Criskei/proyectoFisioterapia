<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipos_ejercicio extends Model
{
    protected $table = 'tipos_ejercicios';
    protected $primaryKey = 'id_tipo_ejercicio';
    use HasFactory;

    public function ejercicios()
    {
        return $this->hasMany(ejercicio::class, 'id_tipo_ejercicio', 'id_tipo_ejercicio');
    }
    
}
