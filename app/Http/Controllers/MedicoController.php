<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        
        $citasHoy = [
            [
                'hora'  => '09:00',
                'paciente' => 'Luis ',
                'motivo' => 'Control general',
                'estado' => 'Pendiente',
            ],
            [
                'hora'  => '10:30',
                'paciente' => 'Maria',
                'motivo' => 'Dolor de garganta',
                'estado' => 'Confirmada',
            ],
            [
                'hora'  => '15:00',
                'paciente' => 'Jose',
                'motivo' => 'Chequeo anual',
                'estado' => 'Cancelada',
            ],
        ];

        return view('medico.inicio', compact('citasHoy'));
    }

}
