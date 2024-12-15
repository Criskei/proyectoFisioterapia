<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    public $timestamps = false;

    use HasFactory;

    public function usuarios()
    {
        return $this->hasMany(User::class, 'id_rol', 'id_rol');
    }
}
