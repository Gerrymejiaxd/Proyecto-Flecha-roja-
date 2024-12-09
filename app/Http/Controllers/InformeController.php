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
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Incidencia;

class InformeController extends Controller
{
    // Muestra el formulario para generar informes
    public function index()
    {
        return view('conductores.informes');
    }

    public function recursosHumanos()
    {
        return view('conductores.pdf.recursos_humanos');
    }

    public function gestionConductores()
    {
        return view('conductores.pdf.gestion_conductores');
    }

    public function generarPDF($id)
    {
        // Usamos findOrFail para manejar la excepción si no se encuentra la incidencia
        $incidencia = Incidencia::findOrFail($id); 

        // Preparar los datos para el PDF
        $data = [
            'item' => $incidencia->item,
            'clave' => $incidencia->clave,
            'colaborador' => $incidencia->colaborador,
            'fecha_incidencia' => $incidencia->fecha_incidencia,
            'fecha_baja' => $incidencia->fecha_baja,
            'incidencia' => $incidencia->descripcion,
            'observacion' => $incidencia->observacion,
        ];

        // Generar el PDF
        $pdf = PDF::loadView('conductores.informes', $data);

        // Descargar el PDF con un nombre más específico
        return $pdf->download("informe_{$incidencia->clave}_gestion_conductores.pdf");
    }

    // Método privado de validación para Recursos Humanos
    private function validateRecursosHumanos(Request $request)
    {
        $request->validate([
            'item' => 'required|string',
            'clave' => 'required|string',
            'colaborador' => 'required|string',
            'fecha_incidencia' => 'required|date',
            'fecha_baja' => 'required|date',
        ]);
    }

    // Preparar los datos para los Recursos Humanos
    private function prepareRecursosHumanosData(Request $request)
    {
        return [
            'item' => $request->item,
            'clave' => $request->clave,
            'colaborador' => $request->colaborador,
            'fecha_incidencia' => $request->fecha_incidencia,
            'fecha_baja' => $request->fecha_baja,
        ];
    }

    // Método privado de validación para la gestión de conductores
    private function validateGestionConductores(Request $request)
    {
        $request->validate([
            'item' => 'required|string',
            'clave' => 'required|string',
            'conductor' => 'required|string',
        ]);
    }

    // Preparar los datos para la gestión de conductores
    private function prepareGestionConductoresData(Request $request)
    {
        return [
            'item' => $request->item,
            'clave' => $request->clave,
            'conductor' => $request->conductor,
        ];
    }

    // Cancelar y redirigir al formulario de informes
    public function cancelar()
    {
        return redirect()->route('informes.index');
    }
}


