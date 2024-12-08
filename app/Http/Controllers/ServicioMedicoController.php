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

    public function informeGestionConductores()
    {
    // Obtener todos los conductores de la base de datos
        $conductores = Conductor::all(); // Asegúrate de que 'Conductor' sea el modelo correcto

        return view('tu_vista_informe', compact('conductores'));
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
    // Validación de los datos de entrada
        $request->validate([
            'incidencias' => 'required|string|max:255',
        ]);

     // Buscar el conductor por ID
        $conductor = Conductor::findOrFail($id);

    // Actualizar las incidencias
        $conductor->incidencias = $request->input('incidencias');
        $conductor->save();

    // Redirigir con un mensaje de éxito
        return redirect()->route('servicio-medico.index')->with('success', 'Incidencias actualizadas correctamente.');
    }
}
