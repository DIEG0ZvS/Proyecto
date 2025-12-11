<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cita;
use App\Models\Medico;
use App\Models\Especialidad;

class PacienteController extends Controller
{
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
        $citas = Cita::where('paciente_id', $paciente->id)
            ->with(['medico.user', 'medico.especialidad'])
            ->orderByDesc('fecha_hora')
            ->get();
        $especialidades = Especialidad::all();
        $medicos = Medico::with('user', 'especialidad')->get();

        return view('paciente.inicio', compact('citas', 'especialidades', 'medicos'));
    }

    public function reservar(Request $request)
    {
        $paciente = $this->getPacienteAuthenticated();
        $request->validate([
            'medico_id',
            'fecha',
            'hora',
            'tipo'
        ]);
        $fechaHora = $request->input('fecha') . ' ' . $request->input('hora');
        Cita::create([
            'paciente_id' => $paciente->id,
            'medico_id' => $request->input('medico_id'),
            'fecha_hora' => $fechaHora,
            'tipo' => $request->input('tipo'),
            'estado' => 'pendiente',
        ]);

        return back()->with('Su cita ha sido solicitada correctamente.');
    }
}