<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dificultad extends Model
{
    protected $table = 'dificultades';
    protected $primaryKey = 'id_dificultad';

    public function ejercicios()
    {
        return $this->hasMany(ejercicio::class, 'id_dificultad', 'id_dificultad');
    }
    use HasFactory;
}
