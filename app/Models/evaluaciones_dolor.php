<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluaciones_dolor extends Model
{
    protected $table = 'evaluaciones_dolor';
    protected $primaryKey = 'id_dolor';
    use HasFactory;

    public function historia_clinica()
    {
        return $this->belongsTo(historias_clinica::class, 'id_historia', 'id_historia');
    }
    
}
