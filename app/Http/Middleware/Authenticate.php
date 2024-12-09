<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate 
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Redirige a la página de login si no está autenticado
            return redirect()->route('login');
        }
        return $next($request);
    }
}
