<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CentroController extends Controller
{
    public function index()
    {
        // Lista de médicos del centro
        $medicos = [
            [
                'nombre' => 'Dra. An',
                'especialidad' => 'Pediatría',
                'telefono' => '987654321',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Dr. Juan',
                'especialidad' => 'Medicina General',
                'telefono' => '912345678',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Dr. Carlos Ramos',
                'especialidad' => 'Odontología',
                'telefono' => '923456789',
                'estado' => 'Inactivo',
            ]
        ];

        // Citas del día
        $citas = [
            [
                'hora' => '08:30',
                'paciente' => 'Luis',
                'medico' => 'Dra. Ana',
                'especialidad' => 'Pediatría',
            ],
            [
                'hora' => '11:00',
                'paciente' => 'Maria',
                'medico' => 'Dr. Juan',
                'especialidad' => 'Medicina General',
            ],
        ];

        return view('centro.inicio', compact('medicos', 'citas'));
    }
}
