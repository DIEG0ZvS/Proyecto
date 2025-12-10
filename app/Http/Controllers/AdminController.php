<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Cita;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Muestra el dashboard del administrador con datos dinámicos de la BD.
     */
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
            'totalUsuarios', 
            'totalMedicos', 
            'totalPacientes', 
            'totalCentros', 
            'citasHoy', 
            'citasPendientes', 
            'medicos', 
            'pacientes'
        ));
    }
}