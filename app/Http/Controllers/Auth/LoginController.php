<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Redirigir a los usuarios después de iniciar sesión según su rol.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $role = Auth::user()->roles->pluck('name')->first(); // Obtener el nombre del rol del usuario

        // Dependiendo del rol, redirigir a la ruta correspondiente
        switch ($role) {
            case 'Admin':
                return '/admin';
            case 'Doctor':
                return '/doctor';
            case 'Farmaceutico':
                return '/farmaceutico';
            default:
                return '/home'; // Ruta predeterminada si no coincide ningún rol
        }
    }
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
