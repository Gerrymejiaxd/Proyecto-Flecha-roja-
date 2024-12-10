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
    public function buscar()
    {
        $conductores = Conductor::paginate(5);
        return view('conductores.busqueda', compact('conductores'));

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

        Conductor::create([
            'clave' => $request->clave,
            'nombre' => $request->conductor,
            'fecha_ingreso' => $request->fecha_ingreso,
            'rol' => $request->rol,
            'zona' => $request->zona,
            'estatus' => $request->estatus,
        ]);

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
        })->paginate(10); // Paginación en lugar de traer todos los conductores
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

        $conductor->update([
            'clave' => $request->clave,
            'nombre' => $request->conductor,
            'fecha_ingreso' => $request->fecha_ingreso,
            'rol' => $request->rol,
            'zona' => $request->zona,
            'estatus' => $request->estatus,
        ]);

        return redirect()->route('conductores.gestion')->with('success', 'Conductor actualizado correctamente.');
    }

    // Métodos para la generación de informes PDF
    public function pdfAlta()
    {
        $conductores = Conductor::paginate(10); // Paginación para evitar cargar demasiados datos
        $pdf = PDF::loadView('conductores.pdf.alta', compact('conductores'));
        return $pdf->download('alta_conductores.pdf');
    }

    public function pdfBaja()
    {
        $conductores = Conductor::where('estatus', 'baja')->paginate(10); // Paginación también aquí
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

        $conductores = $query->paginate(10); // Paginación para PDFs
        $pdf = PDF::loadView('conductores.pdf.busqueda', compact('conductores'));
        return $pdf->download('busqueda_conductores.pdf');
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
