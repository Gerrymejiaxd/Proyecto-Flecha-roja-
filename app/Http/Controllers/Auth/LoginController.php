<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller 
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar las credenciales
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar usuario en base de datos por correo
        $user = User::where('email', $request->email)->first();

        // Verificar si el usuario existe
        if ($user && Hash::check($request->password, $user->password)) {
            // Autenticación exitosa, iniciar sesión
            Auth::login($user);

            return $this->authenticated($request, $user);
        }

        // Si las credenciales son incorrectas, redirigir de nuevo con un mensaje de error
        return redirect()->back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        // Redirigir según el rol del usuario
        if ($user->hasRole('gestión.conductores')) {
            return redirect()->route('usuarios.gestionar'); // Redirige a la gestión de usuarios
        } elseif ($user->hasRole('servicio_medico')) {
            return redirect()->route('servicio_medico.index');
        } elseif ($user->hasRole('asignacion_conductores')) {
            return redirect()->route('asignacion_conductores.index');
        }

        // Redirigir a la gestión de conductores si el rol no está especificado
        return redirect()->route('conductores.gestion'); 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login'); 
    }
}


