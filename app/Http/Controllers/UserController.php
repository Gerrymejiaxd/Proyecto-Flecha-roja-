<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function manageUsers()
    {
    
        if (!auth()->user()->hasRole('admin')) {
            return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta página.');
        }

        return view('conductores.gestionar_usuarios');
    }
}

