<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuscarController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return redirect()->route('login');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// grupos
Route::middleware('auth')->group(function () {

    Route::get('/paciente', [PacienteController::class, 'index'])
        ->name('paciente.inicio');

    Route::get('/medico', [MedicoController::class, 'dashboard']) 
        ->name('medico.inicio');

    Route::get('/centro', [CentroController::class, 'index'])
        ->name('centro.inicio');

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.inicio');

    Route::get('/buscar', [App\Http\Controllers\BuscarController::class, 'index'])
        ->name('buscar.medicos');

    Route::get('/medicos/{medico}', [App\Http\Controllers\MedicoController::class, 'show'])
        ->name('medico.show');
});

//medico
Route::middleware(['auth'])->group(function () {
    

    Route::get('/medico/citas', [MedicoController::class, 'citasDelDia'])
        ->name('medico.citas');

    Route::get('/medico/historial', [MedicoController::class, 'historial'])
        ->name('medico.historial');

    Route::get('/medico/horarios', [MedicoController::class, 'horarios'])
        ->name('medico.horarios');

    Route::post('/medico/horarios/guardar', [MedicoController::class, 'guardarHorario'])
        ->name('medico.horarios.guardar');

    Route::get('/medico/teleconsulta/{id}', [MedicoController::class, 'teleconsulta'])
        ->name('medico.teleconsulta');

    // Finalizar consulta: mostrar formulario y guardar diagnóstico
    Route::get('/medico/citas/{id}/finalizar', [MedicoController::class, 'finalizarForm'])
        ->name('medico.citas.finalizar');

    Route::post('/medico/citas/{id}/finalizar', [MedicoController::class, 'finalizarStore'])
        ->name('medico.citas.finalizar.store');

});
