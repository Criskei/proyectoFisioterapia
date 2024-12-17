<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriasClinicasMiembrosInferior extends Model
{
    protected $table = 'historias_clinicas_miembros_inferiores';    
    public $incrementing = false;
    protected $primaryKey = 'id_historia';
    public $timestamps = false;
    use HasFactory;

    public function historias_clinicas()
    {
        return $this->belongsTo(HistoriasClinica::class, 'id_historia', 'id_historia');
    }
    
    protected $casts = [
        'huella_plantar' => 'byte'
    ];    
}
