<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    use HasFactory, Notifiable;

    protected $fillable = [
        'id_rol',
        'nombres',
        'apellidos',
        'celular',
        'fecha_nacimiento',
        'direccion',
        'sexo',
        'email',
        'password',
    ];

    public function roles()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }

    public function pacientes()
    {
        return $this->hasOne(Paciente::class, 'id_usuario', 'id_usuario');
    }

    public function fisioterapeutas()
    {
        return $this->hasOne(Fisioterapeuta::class, 'id_usuario', 'id_usuario');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
