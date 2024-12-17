<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionesDolor extends Model
{
    protected $table = 'EvaluacionesDolor';
    protected $primaryKey = 'id_dolor';
    use HasFactory;

    public function historias_clinicas()
    {
        return $this->belongsTo(HistoriasClinica::class, 'id_historia', 'id_historia');
    }
    
}
