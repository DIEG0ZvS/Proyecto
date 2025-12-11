<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Centro;
use App\Models\Cita;
use App\Models\Medico;

class CentroController extends Controller
{
    public function index()
    {
        $medicos = Medico::where('centro_salud_id', $centro->id)
                         ->with(['user', 'especialidad'])
                         ->get();

        $medicoIds = $medicos->pluck('id')->toArray();
        $citasHoy = Cita::whereIn('medico_id', $medicoIds)
                        ->whereDate('fecha_hora', today())
                        ->whereIn('estado', ['pendiente', 'confirmada'])
                        ->with(['paciente.user', 'medico.user'])
                        ->orderBy('fecha_hora')
                        ->get();

        return view('centro.inicio', compact('centro', 'medicos', 'citasHoy'));
    }
}