<?php

namespace App\Http\Controllers;

use App\Models\Incidencia; 
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function index()
    {
        $incidencias = Incidencia::all();
        return view('conductores.gestion.incidencias', compact('incidencias')); // Pasa las incidencias a la vista
    }
}
