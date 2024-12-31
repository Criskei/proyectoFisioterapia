<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     
        $ejercicios = Ejercicio::all();

        return Inertia::render('Admi/Ejercicio', [
            'ejercicios' => $ejercicios,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ejercicio $Ejercicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ejercicio $Ejercicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ejercicio $Ejercicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ejercicio $Ejercicio)
    {
        //
    }
}
