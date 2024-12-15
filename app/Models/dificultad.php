<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dificultad extends Model
{
    protected $table = 'dificultades';
    protected $primaryKey = 'id_dificultad';
    public $timestamps = false;
    use HasFactory;

    public function ejercicios()
    {
        return $this->hasMany(Ejercicio::class, 'id_dificultad', 'id_dificultad');
    }
    
}
