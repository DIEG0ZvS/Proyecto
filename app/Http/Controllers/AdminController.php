<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Cita;
use App\Models\Especialidad;
use App\Models\Centro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();
        $totalMedicos = User::where('rol', 'medico')->count();
        $totalPacientes = User::where('rol', 'paciente')->count();
        $totalCentros = User::where('rol', 'centro')->count();
        $citasHoy = Cita::whereDate('fecha_hora', today())->count();
        $citasPendientes = Cita::where('estado', 'pendiente')->count();
        $medicos = Medico::with('user', 'especialidad', 'centroSalud')->get();
        $pacientes = Paciente::with('user')->get();

        return view('admin.inicio', compact(
            'totalUsuarios', 'totalMedicos', 'totalPacientes', 'totalCentros', 
            'citasHoy', 'citasPendientes', 'medicos', 'pacientes'
        ));
    }

    public function crearMedico()
    {
        $especialidades = Especialidad::all();
        $centros = Centro::all();

        return view('admin.medico.crear', compact('especialidades', 'centros'));
    }

    public function storeMedico(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'num_colegiatura' => 'required|string|unique:medicos',
            'especialidad_id' => 'required|exists:especialidades,id',
            'telefono' => 'nullable|string',
            'centro_salud_id' => 'nullable|exists:centros,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'medico',
        ]);

        Medico::create([
            'user_id' => $user->id,
            'num_colegiatura' => $request->num_colegiatura,
            'especialidad_id' => $request->especialidad_id,
            'centro_salud_id' => $request->centro_salud_id,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('admin.inicio')->with('success', 'Médico registrado exitosamente.');
    }

    public function crearCentro()
    {
        return view('admin.centro.crear');
    }

    public function storeCentro(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'nombre_centro' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'centro',
        ]);

        Centro::create([
            'user_id' => $user->id,
            'nombre' => $request->nombre_centro,
            'direccion' => $request->direccion,
        ]);

        return redirect()->route('admin.inicio')->with('success', 'Centro de Salud registrado exitosamente.');
    }
}