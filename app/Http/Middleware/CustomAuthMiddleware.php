<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->guest()){
            return redirect('/admin');
        }
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->estado === 1){
                return $next($request);
            }else {
                // Cerrar la sesión
                Auth::logout();
                // Redirigir con un mensaje
                return redirect('/login')->with('error', 'Tu cuenta está desactivada. Por favor, contacta al administrador.');
            }
        }else{
            return redirect('/login');
        }
    }
}
