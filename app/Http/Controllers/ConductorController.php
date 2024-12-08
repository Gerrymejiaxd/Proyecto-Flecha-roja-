<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;
use Barryvdh\DomPDF\PDF;
use App\Models\User;
use App\Models\Role;

class ConductorController extends Controller
{
    public function alta()
    {
        return view('conductores.alta');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'clave' => 'required|string|max:255',
            'conductor' => 'required|string|max:255',
            'fecha_ingreso' => 'required|date',
            'rol' => 'required|string|max:255',
            'zona' => 'required|string|max:255',
            'estatus' => 'required|string|max:255',
        ]);

        $conductor = new Conductor();
        $conductor->clave = $request->clave;
        $conductor->nombre = $request->conductor;
        $conductor->fecha_ingreso = $request->fecha_ingreso;
        $conductor->rol = $request->rol;
        $conductor->zona = $request->zona;
        $conductor->estatus = $request->estatus;
        $conductor->save();

        return redirect()->route('conductores.alta')->with('success', 'Conductor registrado exitosamente.');
    }

    public function baja(Request $request)
    {
        $conductores = $this->buscarConductores($request);
        return view('conductores.baja', compact('conductores'));
    }

    public function gestion(Request $request)
    {
        $conductores = $this->buscarConductores($request);
        return view('conductores.gestion_conductores', compact('conductores'));
    }

    private function buscarConductores(Request $request)
    {
        $request->validate([
            'clave' => 'nullable|string',
            'nombre' => 'nullable|string',
        ]);

        $clave = $request->input('clave');
        $nombre = $request->input('nombre');

        return Conductor::when($clave, function ($query, $clave) {
            return $query->where('clave', 'like', '%' . $clave . '%');
        })->when($nombre, function ($query, $nombre) {
            return $query->where('nombre', 'like', '%' . $nombre . '%');
        })->oldest()->get(); // Ejecuta la consulta
    }

    public function darBaja(Request $request)
    {
        $request->validate([
            'clave' => 'required|string|max:255',
            'conductor' => 'required|string|max:255',
        ]);

        $conductor = Conductor::where('clave', $request->clave)
            ->orWhere('nombre', $request->conductor)
            ->first();

        if ($conductor) {
            $conductor->delete();
            return redirect()->route('conductores.baja')->with('success', 'Conductor dado de baja.');
        } else {
            return redirect()->route('conductores.baja')->with('error', 'Conductor no encontrado.');
        }
    }

    public function buscar(Request $request)
    {
        $query = Conductor::query();

        if ($request->filled('clave')) {
            $query->where('clave', $request->clave);
        }

        if ($request->filled('nombre')) {
            $query->where('nombre', 'LIKE', '%' . $request->nombre . '%');
        }

        $conductores = $query->get();

        return view('conductores.index', compact('conductores'));
    }

    public function busqueda(Request $request)
    {
        $query = Conductor::query();

        if ($request->filled('clave')) {
            $query->where('clave', $request->clave);
        }

        if ($request->filled('nombre')) {
            $query->where('nombre', 'LIKE', '%' . $request->nombre . '%');
        }

        $conductores = $query->get();

        return view('conductores.index', compact('conductores'));
    } 

    public function buscarPorId($id) // Renombrado
    {
        $conductor = Conductor::findOrFail($id); // Encuentra el conductor por ID
        return view('conductores.búsqueda', compact('conductor')); // Pasa el conductor a la vista
    }

    public function resultadosBusqueda(Request $request)
    {
        $conductores = Conductor::query();

        if ($request->filled('zona')) {
            $conductores->where('zona', $request->zona);
        }
        if ($request->filled('estatus')) {
            $conductores->where('estatus', $request->estatus);
        }
        if ($request->filled('tipo_contratacion')) {
            $conductores->where('tipo_contratacion', $request->tipo_contratacion);
        }

        $resultados = $conductores->get();

        return view('conductores.resultados', compact('resultados'));
    }

    public function modificar($id)
    {
        $conductor = Conductor::findOrFail($id);
        return view('conductores.editar', compact('conductor'));
    }

    public function actualizar(Request $request, $id)
    {
        $conductor = Conductor::findOrFail($id);
        $request->validate([
            'clave' => 'required|string|max:255',
            'conductor' => 'required|string|max:255',
            'fecha_ingreso' => 'required|date',
            'rol' => 'required|string|max:255',
            'zona' => 'required|string|max:255',
            'estatus' => 'required|string|max:255',
        ]);

        $conductor->clave = $request->clave;
        $conductor->nombre = $request->conductor;
        $conductor->fecha_ingreso = $request->fecha_ingreso;
        $conductor->rol = $request->rol;
        $conductor->zona = $request->zona;
        $conductor->estatus = $request->estatus;
        $conductor->save();

        return redirect()->route('conductores.buscar')->with('success', 'Conductor actualizado correctamente.');
    }

    public function generarInforme(Request $request)
    {
        // Lógica para generar informes
    }

    public function pdfAlta()
    {
        $conductores = Conductor::all();
        $pdf = PDF::loadView('conductores.pdf.alta', compact('conductores'));
        return $pdf->download('alta_conductores.pdf');
    }

    public function pdfBaja()
    {
        $conductores = Conductor::where('estatus', 'baja')->get();
        $pdf = PDF::loadView('conductores.pdf.baja', compact('conductores'));
        return $pdf->download('baja_conductores.pdf');
    }

    public function pdfBusqueda(Request $request)
    {
        $query = Conductor::query();

        if ($request->filled('clave')) {
            $query->where('clave', $request->clave);
        }
        if ($request->filled('nombre')) {
            $query->where('nombre', 'LIKE', '%' . $request->nombre . '%');
        }

        $conductores = $query->get();
        $pdf = PDF::loadView('conductores.pdf.busqueda', compact('conductores'));
        return $pdf->download('busqueda_conductores.pdf');
    }

    public function index()
    {
        $conductores = Conductor::all();
        return view('conductores.index', compact('conductores'));
    }

    public function create()
    {
        return view('conductores.alta');
    }

    public function store(Request $request)
    {
        $request->validate([
            'clave' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
        ]);

        $conductor = new Conductor();
        $conductor->clave = $request->clave;
        $conductor->nombre = $request->nombre;
        $conductor->save();

        return redirect()->route('conductores.index')->with('success', 'Conductor creado exitosamente.');
    }

    public function manageUsers()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('conductores.manage_users', compact('users', 'roles'));
    }
    
    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required|array',
        ]);

        $user->roles()->sync($request->roles);
        return redirect()->route('conductores.manage_users')->with('success', 'Roles asignados exitosamente.');
    }
}
