<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cita;
use App\Models\Horario;

class MedicoController extends Controller
{
    public function dashboard()
    {
        return view('medico.dashboard');
    }

    public function citas()
    {
        $medico = Auth::user()->medico;
        $citas = Cita::where('medico_id', $medico->id)
            ->whereIn('estado', ['pendiente', 'confirmada'])
            ->with(['paciente.user']) 
            ->orderBy('fecha_hora')
            ->get();

        return view('medico.citas', compact('citas'));
    }

    public function horarios()
    {
        $medico = Auth::user()->medico;

        $horarios = Horario::where('medico_id', $medico->id)
            ->get(); 

        return view('medico.horarios', compact('horarios'));
    }

    public function guardarHorario(Request $request)
    {
        $request->validate([
            'dia' => 'required|string',
            'inicio' => 'required|date_format:H:i',
            'fin' => 'required|date_format:H:i|after:inicio',
        ]);

        $medico = Auth::user()->medico;

        $medico->horarios()->create([
            'dia' => $request->input('dia'),
            'hora_inicio' => $request->input('inicio'),
            'hora_fin' => $request->input('fin'),
        ]);

        return back()->with('success', 'Horario registrado correctamente.');
    }

    public function teleconsulta($id)
    {
        return view('medico.teleconsulta', compact('id'));
    }

    /**
     * Mostrar formulario para finalizar la consulta y escribir diagnóstico.
     */
    public function finalizarForm($id)
    {
        $medico = Auth::user()->medico;

        $cita = Cita::with('paciente.user')->findOrFail($id);

        // Verificar que la cita pertenezca al médico autenticado
        if ($cita->medico_id !== $medico->id) {
            abort(403);
        }

        return view('medico.finalizar', compact('cita'));
    }

    /**
     * Guardar diagnóstico y marcar cita como completada.
     */
    public function finalizarStore(Request $request, $id)
    {
        $request->validate([
            'diagnostico' => 'required|string|max:2000',
        ]);

        $medico = Auth::user()->medico;
        $cita = Cita::findOrFail($id);

        if ($cita->medico_id !== $medico->id) {
            abort(403);
        }

        // 1. CREAR el registro en la nueva tabla 'diagnosticos'
        $cita->diagnostico()->create([
            'diagnostico' => $request->input('diagnostico'),
            'medico_id' => $medico->id, // Guardamos el ID del médico actual
            'paciente_id' => $cita->paciente_id, // Guardamos el ID del paciente de la cita
        ]);
        
        // 2. Marcar solo el estado de la cita como completada
        $cita->estado = 'completada';
        $cita->save();

        return redirect()->route('medico.historial')->with('success', 'Diagnóstico guardado y consulta finalizada.');
    }

    public function historial()
    {
        $medico = Auth::user()->medico;

        $historial = Cita::where('medico_id', $medico->id)
            ->whereIn('estado', ['completada', 'cancelada'])
            // Cargar el paciente, su usuario, y el diagnóstico (si existe)
            ->with(['paciente.user', 'diagnostico']) 
            ->latest('fecha_hora')
            ->get();

        return view('medico.historial', compact('historial'));
    }
}