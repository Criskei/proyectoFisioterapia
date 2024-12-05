<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historias_clinicas_neurologica extends Model
{
    protected $table = 'historias_clinicas_neurologicas';    
    public $incrementing = false;
    protected $primaryKey = 'id_historia';
    public $timestamps = false;
    use HasFactory;

    public function historia_clinica()
    {
        return $this->belongsTo(historias_clinica::class, 'id_historia', 'id_historia');
    }

    // If you want to allow setting JSON columns
    protected $casts = [
        'desarrollo_motor_fino' => 'array',
        'desarrollo_motor_grueso' => 'array',
        'desarrollo_lenguaje' => 'array',
        'exploracion_neurologica' => 'array'
    ];         
}
