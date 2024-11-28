<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class InformeController extends Controller
{
    // Muestra el formulario para generar informes
    public function index()
    {
        return view('informes');
    }

    public function recursosHumanos()
    {
        return view('conductores.pdf.recursos_humanos');
    }

    public function gestionConductores()
    {
        return view('conductores.pdf.gestion_conductores');
    }

    public function generar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'tipo_informe' => 'required|string',
        ]);

        // Dependiendo del tipo de informe, se validan y procesan los datos
        if ($request->tipo_informe === 'recursos_humanos') {
            $this->validateRecursosHumanos($request);

            // Crear el contenido del PDF para Recursos Humanos
            $data = $this->prepareRecursosHumanosData($request);

            // Generar el PDF
            $pdf = PDF::loadView('pdf.recursos_humanos', $data);

            // Descargar el PDF
            return $pdf->download('informe_recursos_humanos.pdf');

        } elseif ($request->tipo_informe === 'gestion_conductores') {
            $this->validateGestionConductores($request);

            // Crear el contenido del PDF para Gestión de Conductores
            $data = $this->prepareGestionConductoresData($request);

            // Generar el PDF
            $pdf = PDF::loadView('pdf.gestion_conductores', $data);

            // Descargar el PDF
            return $pdf->download('informe_gestion_conductores.pdf');
        }

        return redirect()->route('informes.index')->with('error', 'Tipo de informe no válido.');
    }

    private function validateRecursosHumanos(Request $request)
    {
        $request->validate([
            'mes' => 'required|string',
            'clave' => 'required|string',
            'colaborador' => 'required|string',
            'fecha_incidencia' => 'required|date',
            'fecha_baja' => 'required|date',
        ]);
    }

    private function prepareRecursosHumanosData(Request $request)
    {
        return [
            'mes' => $request->mes,
            'clave' => $request->clave,
            'colaborador' => $request->colaborador,
            'fecha_incidencia' => $request->fecha_incidencia,
            'fecha_baja' => $request->fecha_baja,
        ];
    }

    private function validateGestionConductores(Request $request)
    {
        $request->validate([
            'mes' => 'required|string',
            'clave' => 'required|string',
            'conductor' => 'required|string',
        ]);
    }

    private function prepareGestionConductoresData(Request $request)
    {
        return [
            'mes' => $request->mes,
            'clave' => $request->clave,
            'conductor' => $request->conductor,
        ];
    }

    public function cancelar()
    {
        return redirect()->route('informes.index');
    }
}