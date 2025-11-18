<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = [
            [
                'nombre' => 'Diego Paciente',
                'email'  => 'paciente@example.com',
                'rol'    => 'paciente',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Yuleymir Médico',
                'email'  => 'medico@example.com',
                'rol'    => 'medico',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Centro Huánuco',
                'email'  => 'centro@example.com',
                'rol'    => 'centro',
                'estado' => 'Activo',
            ],
            [
                'nombre' => 'Admin General',
                'email'  => 'admin@example.com',
                'rol'    => 'admin',
                'estado' => 'Activo',
            ],
        ];

        return view('admin.inicio', compact('usuarios'));
    }
}
