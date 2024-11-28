<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        // Credenciales específicas
        $specificEmail = 'gerardo.mejia1408@gmail.com';
        $specificPassword = '$2y$12$JMYSu3zgQK3vXSSnUQk2dO30YjINZJhfmfSUda/alzvevi3uU4bZ2'; // Contraseña encriptada

        // Verificar si las credenciales son las específicas
        if ($request->email === $specificEmail && Hash::check($request->password, $specificPassword)) {
            // Autenticación exitosa, iniciar sesión manualmente
            $user = \App\Models\User::where('email', $specificEmail)->first();
            Auth::login($user);

            return $this->authenticated($request, $user);
        }

        // Intentar autenticar al usuario normalmente
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->authenticated($request, Auth::user());
        }

        // Si las credenciales son incorrectas, redirigir de nuevo con un mensaje de error
        return redirect()->back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('servicio_medico')) {
            return redirect()->route('servicio_medico.index');
        } elseif ($user->hasRole('asignacion_conductores')) {
            return redirect()->route('asignacion_conductores.index');
        }

        return redirect()->route('conductores.index'); 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login'); 
    }
}