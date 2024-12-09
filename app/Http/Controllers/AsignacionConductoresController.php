<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;

class AsignacionConductoresController extends Controller
{
    // Mostrar la lista de conductores con paginación
    public function index()
    {
        // Usar paginación en lugar de obtener todos los conductores
        $conductores = Conductor::paginate(10);  // Pagina los resultados a 10 conductores por página
        return view('asignacion_conductores', compact('conductores'));
    }

    // Método para modificar los datos del conductor
    public function modificar(Request $request, $id)
    {
        // Validar los datos recibidos en el request
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            // Agregar más validaciones según los campos de conductor que necesitas
        ]);

        // Buscar el conductor por su ID
        $conductor = Conductor::find($id);

        // Verificar si el conductor existe
        if (!$conductor) {
            return redirect()->route('asignacion_conductores.index')
                             ->with('error', 'Conductor no encontrado.');
        }

        // Actualizar los datos del conductor
        $conductor->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            // Aquí agregar los demás campos a actualizar
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('asignacion_conductores.index')
                         ->with('success', 'Datos del conductor actualizados correctamente.');
    }
}




