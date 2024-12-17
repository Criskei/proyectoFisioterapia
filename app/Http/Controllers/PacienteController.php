<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::with([
            'usuarios',
        ])->get();

        return Inertia::render('Admi/Paciente', [
            'pacientes' => $pacientes,
        ]);
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
        $fechaActual = now()->toDateString();

        $usuario = User::create([
            'id_rol' => '3',      
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'celular' => $request->celular,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'direccion' => $request->direccion,
            'sexo' => $request->sexo,
            'email' => $request->email,
            'password' => 'contraseña',
        ]);

        $paciente = $usuario->pacientes()->create([
            'tutor_nombre' => $request->tutor_nombre,
            'tutor_parentesco' => $request->tutor_parentesco,
            'fecha_ingreso' => $fechaActual,
            'escolaridad' => $request->escolaridad,
        ]);

        return redirect()->route('Paciente.ver', ['id' => $paciente->id_paciente]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::with([
            'usuarios',
            'antecedentes_heredofamiliares',
            'antecedentes_prenatales',
            'antecedentes_perinatales',
            'historias_clinicas.fisioterapeutas.usuarios',
            'tratamientos',
            'citas'
        ])->find($id);

        return Inertia::render('Admi/PacienteVer', [
            'paciente' => $paciente,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $Paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $Paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $Paciente)
    {
        //
    }
}
