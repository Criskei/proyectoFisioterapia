<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriasClinicasPostural extends Model
{
    protected $table = 'historias_clinicas_posturales';    
    public $incrementing = false;
    protected $primaryKey = 'id_historia';
    public $timestamps = false;
    use HasFactory;

    public function historia_clinica()
    {
        return $this->belongsTo(HistoriasClinica::class, 'id_historia', 'id_historia');
    }
    
}
