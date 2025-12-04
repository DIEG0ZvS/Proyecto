<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Credenciales incorrectas');
        }

        // Aquí es donde empieza a fallar si la lógica es incorrecta.
        if ($user->role == 'medico') {
            auth()->login($user);
            return redirect()->route('medico.inicio'); // Ruta a /medico/dashboard
        } elseif ($user->role == 'paciente') {
            auth()->login($user);
            return redirect()->route('paciente.inicio');
        } elseif ($user->role == 'admin') {
            auth()->login($user);
            return redirect()->route('admin.inicio');
        } elseif ($user->role == 'centro') {
            auth()->login($user);
            return redirect()->route('centro.inicio');
        }

        // Caso de seguridad: si tiene un rol desconocido, redirige a home
        auth()->login($user);
        return redirect('/home');
    }

}
