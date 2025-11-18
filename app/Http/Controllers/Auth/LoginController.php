<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Redireccion

    protected function authenticated(Request $request, $user)
    {
        switch ($user->rol) {
            case 'paciente':
                return redirect()->route('paciente.inicio');
            case 'medico':
                return redirect()->route('medico.inicio');
            case 'centro':
                return redirect()->route('centro.inicio');
            case 'admin':
                return redirect()->route('admin.inicio');
            default:
                return redirect('/home');
        }
    }
}
