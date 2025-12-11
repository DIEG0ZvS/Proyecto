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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


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

        if ($user->rol == 'medico') {
            auth()->login($user);
            return redirect()->route('medico.inicio');
        } elseif ($user->rol == 'paciente') {
            auth()->login($user);
            return redirect()->route('paciente.inicio');
        } elseif ($user->rol == 'admin') {
            auth()->login($user);
            return redirect()->route('admin.inicio');
        }

        auth()->login($user);
        return redirect('/home');
    }

    protected function authenticated(Request $request, $user)
    {
        switch ($user->rol) {
            case 'paciente':
                return redirect()->route('paciente.inicio');
            case 'medico':
                return redirect()->route('medico.inicio');
            case 'admin':
                return redirect()->route('admin.inicio');
            default:
                return redirect('/home');
        }
    }

}
