<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function manageUsers()
    {

        if (!auth()->user()->hasRole('gestion_conductores')) {
            return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta página.');
        }

        //TODO: Agregar la variable de Usuarios
        return view('conductores.gestionar_usuarios');
    }
}
