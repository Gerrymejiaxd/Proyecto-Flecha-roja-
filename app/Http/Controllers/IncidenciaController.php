<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use App\Models\Incidencia; 
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function index()
    {
        $incidencias = Incidencia::all();
        $conductores = Conductor::paginate(5);
        return view('incidencias.index', compact('incidencias','conductores')); 
    }
}
