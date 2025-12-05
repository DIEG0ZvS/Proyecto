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


    Route::get('/centro', [CentroController::class, 'index'])
        ->name('centro.inicio');

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.inicio');


});

//medico
Route::group(['prefix' => 'medico', 'middleware' => 'auth'], function () {
    
    Route::get('/', [MedicoController::class, 'dashboard'])->name('medico.inicio');
    // Ruta alternativa/alias usada por algunas vistas
    Route::get('/dashboard', [MedicoController::class, 'dashboard'])->name('medico.dashboard');
    Route::get('/citas', [MedicoController::class, 'citas'])->name('medico.citas');
    Route::get('/historial', [MedicoController::class, 'historial'])->name('medico.historial');
    
    Route::get('/horarios', [MedicoController::class, 'horarios'])->name('medico.horarios');
    Route::post('/horarios/guardar', [MedicoController::class, 'guardarHorario'])->name('medico.horarios.guardar');
    
    Route::get('/teleconsulta/{id}', [MedicoController::class, 'teleconsulta'])->name('medico.teleconsulta');
    Route::get('/citas/{id}/finalizar', [MedicoController::class, 'finalizarForm'])->name('medico.citas.finalizar');
    Route::post('/citas/{id}/finalizar', [MedicoController::class, 'finalizarStore'])->name('medico.citas.finalizar.store');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/paciente', [PacienteController::class, 'index'])
        ->name('paciente.inicio');

    Route::post('/paciente/reservar', [PacienteController::class, 'reservar'])
        ->name('paciente.reservar');

    // (Ruta de búsqueda eliminada — no se usa)
});