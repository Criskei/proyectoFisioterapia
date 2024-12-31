<?php

namespace App\Http\Controllers;

use App\Models\AntecedentesHeredofamiliar;
use App\Models\AntecedentesPerinatal;
use App\Models\AntecedentesPrenatal;
use App\Models\HistoriasClinica;
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
    public function createHistoria(Request $request){

        
        $historiaClinica = HistoriasClinica::create([
            'id_paciente' => $request->id_paciente,
            'profesional_registro' => $request ->profesional_registro,
            'tipo_historia' => $request ->tipo_historia,
            'fecha_registro' => $request ->fecha_registro,
            'motivo_consulta' => $request ->motivo_consulta,
            'diagnostico_medico' => $request ->diagnostico_medico,
            'medicamentos' => $request ->medicamentos,
            'examenes_complementarios' => $request ->examenes_complementarios,
        ]);        
    }

    public function create(Request $request)
    {
        $id_paciente = $request->id_paciente;
        $antecPrenatal = AntecedentesPrenatal::create([
            'id_paciente' => $id_paciente,
            'gesta' => $request ->gesta,
            'para' => $request ->para,
            'cesarea' => $request ->cesarea,
            'abortos' => $request ->abortos,
            'edad_madre_embarazo' => $request ->edad_madre_embarazo,
            'semanas_gestacion' => $request ->semanas_gestacion,
            'control_prenatal' => $request ->control_prenatal,
            'profesional_control' => $request ->profesional_control,
            'complicaciones' => $request ->complicaciones,
            'alimentacion' => $request ->alimentacion,
            'traumatismos' => $request ->traumatismos,
        ]);

        $antecPerinatal = AntecedentesPerinatal::create([
            'id_paciente' => $id_paciente,
            'trabajo_parto_caracteristicas' => $request ->trabajo_parto_caracteristicas,
            'duracion_trabajo_parto' => $request ->duracion_trabajo_parto,
            'lugar_atencion' => $request ->lugar_atencion,
            'metodo_obtencion' => $request ->metodo_obtencion,
            'complicaciones_extraccion' => $request ->complicaciones_extraccion,
            'uso_forceps' => $request ->uso_forceps,
            'incubadora' => $request ->incubadora,
            'tiempo_incubadora' => $request ->tiempo_incubadora,
        ]);

        $antecHeredofamiliar = AntecedentesHeredofamiliar::create([
            'id_paciente' => $id_paciente,
            'descripcion' => $request ->descripcion,
        ]);
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
            'tratamientos.fisioterapeutas.usuarios',
            'citas.fisioterapeutas.usuarios'
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
