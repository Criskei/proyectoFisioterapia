<?php

namespace App\Http\Controllers;

use App\Models\paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pacientes = paciente::with('usuario')->get();
        // return Inertia::render('Admi/Paciente', ['pacientes' => $pacientes]);

        // $pacientes = DB::table'usuarios')->get();
        // $pacientes = DB::table('usuarios')->get();
        $pacientes  = DB::select('SELECT * FROM usuarios');

        return Inertia::render('Admi/Paciente', ['pacientes' => $pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Crear un nuevo usuario y guardarlo en la base de datos
        $user = new User();
        $user->rol_id = 3;
        $user->nombres = $request->input('nombres');
        $user->apellidos = $request->input('apellidos');
        $user->celular = $request->input('celular');
        $user->email = $request->input('email');
        $user->password = Hash::make('password');  // Hashear la contraseña
        $user->activo = 1;  // Establecer el usuario como activo
        $user->save();

        // Redireccionar a la vista de pacientes.index
        return redirect()->route('paciente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = DB::select('SELECT * FROM usuarios WHERE usuario_id = ?', [$id]);


        return Inertia::render('Admi/PacienteInfo', [
            
            'usuario' => $usuario
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(paciente $paciente)
    {
        //
    }
}
