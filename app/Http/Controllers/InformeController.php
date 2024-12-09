<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
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
        $incidencia = Incidencia::find($id);

        if (!$incidencia) {
            return redirect()->route('informes.index')->with('error', 'Incidencia no encontrada.');
        }

        $data = [
            'item' => $incidencia->item,
            'clave' => $incidencia->clave,
            'colaborador' => $incidencia->colaborador,
            'fecha_incidencia' => $incidencia->fecha_incidencia,
            'fecha_baja' => $incidencia->fecha_baja,
            'incidencia' => $incidencia->descripcion,
            'observacion' => $incidencia->observacion,
        ];

        $pdf = PDF::loadView('conductores.informes', $data);
        return $pdf->download('informe_gestion_conductores.pdf');
    }


    private function validateRecursosHumanos(Request $request)
    {
        $request->validate([
            'itwm' => 'required|string',
            'clave' => 'required|string',
            'colaborador' => 'required|string',
            'fecha_incidencia' => 'required|date',
            'fecha_baja' => 'required|date',
        ]);
    }

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
    

    private function validateGestionConductores(Request $request)
    {
        $request->validate([
            'item' => 'required|string',
            'clave' => 'required|string',
            'conductor' => 'required|string',
        ]);
    }

    private function prepareGestionConductoresData(Request $request)
    {
        return [
            'item' => $request->item,
            'clave' => $request->clave,
            'conductor' => $request->conductor,
        ];
    }

    public function cancelar()
    {
        return redirect()->route('informes.index');
    }
}

