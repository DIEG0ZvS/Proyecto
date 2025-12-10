<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Centro;
use App\Models\Cita;
use App\Models\Medico; // Necesario para consultas

class CentroController extends Controller
{
    /**
     * Valida que el usuario tenga un perfil de centro asociado y lo retorna.
     */
    private function getCentroAuthenticated()
    {
        $centro = Auth::user()->centro; // Usa la relación 'centro()'
        if (!$centro) {
            abort(redirect('/centro')->with('error', 'Perfil de Centro de Salud no configurado.'));
        }
        return $centro;
    }

    /**
     * Muestra el dashboard del Centro de Salud.
     */
    public function index()
    {
        $centro = $this->getCentroAuthenticated();
        
        // 1. Médicos asociados a este centro (Eager load user and specialty)
        $medicos = Medico::where('centro_salud_id', $centro->id)
                         ->with(['user', 'especialidad'])
                         ->get();

        // 2. Citas programadas para los médicos de este centro (Hoy)
        // Obtener IDs de los médicos para filtrar citas
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