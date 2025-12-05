<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cita;
use App\Models\Medico;
use App\Models\Especialidad;

class PacienteController extends Controller
{
    /**
     * Valida que el usuario tenga un perfil de paciente asociado.
     */
    private function getPacienteAuthenticated()
    {
        $paciente = Auth::user()->paciente;
        if (!$paciente) {
            abort(redirect('/home')->with('error', 'Perfil de paciente no configurado.'));
        }
        return $paciente;
    }

    public function index()
    {
        $paciente = $this->getPacienteAuthenticated();

        // 1. Obtener las citas reales de este paciente
        $citas = Cita::where('paciente_id', $paciente->id)
            ->with(['medico.user', 'medico.especialidad']) // Carga ansiosa para optimizar
            ->orderByDesc('fecha_hora')
            ->get();

        // 2. Obtener datos para el formulario de reserva
        $especialidades = Especialidad::all();
        $medicos = Medico::with('user', 'especialidad')->get();

        return view('paciente.inicio', compact('citas', 'especialidades', 'medicos'));
    }

    public function reservar(Request $request)
    {
        $paciente = $this->getPacienteAuthenticated();

        // 1. Validación de datos
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'tipo' => 'required|in:presencial,teleconsulta' // Valores en el formulario
        ]);

        // 2. Combinar fecha y hora para crear el datetime
        $fechaHora = $request->input('fecha') . ' ' . $request->input('hora');

        // 3. Crear la cita en la Base de Datos
        Cita::create([
            'paciente_id' => $paciente->id,
            'medico_id' => $request->input('medico_id'),
            'fecha_hora' => $fechaHora,
            'tipo' => $request->input('tipo'),
            'estado' => 'pendiente', // Estado inicial por defecto
        ]);

        return back()->with('success', 'Su cita ha sido solicitada correctamente.');
    }
}