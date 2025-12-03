<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class BuscarController extends Controller
{
    public function index(Request $request)
    {
        $especialidades = Especialidad::all();
        $medicos = collect(); 
        if ($request->has('especialidad_id') && $request->get('especialidad_id') != '') {
            $especialidadId = $request->get('especialidad_id');

            $medicos = Medico::with(['user', 'especialidad', 'centroSalud'])
                             ->where('especialidad_id', $especialidadId)
                             ->get();
        }    
        return view('search.index', compact('medicos', 'especialidades'));
    }
}