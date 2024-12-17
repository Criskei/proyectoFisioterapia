<?php

namespace App\Http\Controllers;

use App\Models\Fisioterapeuta;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FisioterapeutaController extends Controller
{    
    public function index()
    {
        $fisioterapeutas = Fisioterapeuta::with('usuarios')->get();

        return Inertia::render('Admi/Fisioterapeuta', ['fisioterapeutas'=>$fisioterapeutas]);
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
    public function show(Fisioterapeuta $Fisioterapeuta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fisioterapeuta $Fisioterapeuta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fisioterapeuta $Fisioterapeuta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fisioterapeuta $Fisioterapeuta)
    {
        //
    }
}
