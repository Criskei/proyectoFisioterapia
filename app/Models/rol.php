<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $table = "roles";
    protected $primaryKey = "rol_id";
    use HasFactory;
}
