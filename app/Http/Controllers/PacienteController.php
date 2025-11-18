<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        
        $citas = [
            [
                'fecha' => '2025-11-20',
                'hora'  => '09:00',
                'medico' => 'Dra. Ana',
                'especialidad' => 'Pediatría',
                'estado' => 'Confirmada',
            ],
            [
                'fecha' => '2025-11-22',
                'hora'  => '16:30',
                'medico' => 'Dr. Juan',
                'especialidad' => 'Medicina General',
                'estado' => 'Pendiente',
            ],
        ];

        return view('paciente.inicio', compact('citas'));
    }
}