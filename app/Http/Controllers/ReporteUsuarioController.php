<?php

namespace App\Http\Controllers;

use App\Models\User;

use Barryvdh\DomPDF\Facade as PDF; // Importa el alias
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;

class ReporteUsuarioController extends Controller
{
    public function generarPDF()
    {
        // Obtener los últimos 10 usuarios
        $usuarios = User::orderBy('created_at', 'desc')->take(10)->get();

        // Cargar la vista para el PDF y pasar los usuarios
        $pdf = FacadePdf::loadView('reportes.usuarios', compact('usuarios'));

        // Descargar el PDF
        return $pdf->download('reporte_usuarios.pdf');
    }
}
