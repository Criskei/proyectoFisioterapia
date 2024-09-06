<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dificultad extends Model
{
    protected $table = "dificultades";
    protected $primaryKey = "dificultad_id";
    use HasFactory;
}
