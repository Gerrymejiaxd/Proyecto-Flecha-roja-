<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;

class AsignacionConductoresController extends Controller
{
    public function index()
    {
        $conductores = Conductor::all(); // Reemplaza esto con tu lógica para obtener los conductores

        return view('asignacion_conductores', compact('conductores'));
    }

    public function modificar(Request $request, $id)
    {

        return redirect()->route('asignacion_conductores.index')->with('success', 'Datos actualizados correctamente.');
    }
}

