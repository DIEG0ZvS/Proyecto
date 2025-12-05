<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Especialidad;

class BuscarController extends Controller
{
    public function index(Request $request)
    {
        // Funcionalidad de búsqueda eliminada — retornar 404 para evitar usos por error.
        abort(404);
    }
}