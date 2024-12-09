<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscarController extends Controller
{
    public function buscar(Request $request)
    {
        // Validación de la solicitud POST
        $request->validate([
            'buscar' => 'required|string|max:255',
        ]);

        // Lógica para manejar la búsqueda
        $buscar = $request->input('buscar');

        // Aquí puedes realizar la búsqueda en la base de datos u otra lógica
        // $resultados = SomeModel::where('campo', 'like', '%'.$buscar.'%')->get();

        // Pasar los resultados a la vista (si es necesario)
        return view('resultados_busqueda', compact('buscar'));
    }
}
