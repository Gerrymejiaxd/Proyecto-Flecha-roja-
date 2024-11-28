<?php

namespace App\Http\Controllers;
use App\Models\Conductor;
use Illuminate\Http\Request;

class ServicioMedicoController extends Controller
{
    public function index()
    {
        // Aquí deberías obtener los datos de los conductores desde la base de datos
        // Por ejemplo:
        $conductores = []; // Reemplaza esto con tu lógica para obtener los conductores

        return view('servicio_medico', compact('conductores'));
    }

    public function modificar($id)
    {
        // Aquí deberías buscar el conductor por ID
        // Por ejemplo:
        $conductor = Conductor::findOrFail($id);

        return view('modificar_incidencias', compact('conductor'));
    }

    public function actualizar(Request $request, $id)
    {
       $request->validate([
        'incidencias' => 'required|string|max:255',
       ]);

       $conductor = Conductor::findOrFail($id);
       $conductor->incidencias = $request->input('incidencias');
       $conductor->save();
       
        return redirect()->route('servicio_medico.index')->with('success', 'Incidencias actualizadas correctamente.');
    }  
}
