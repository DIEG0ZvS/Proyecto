@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Panel de Administración Central</h2>

    {{-- Resumen de Estadísticas --}}
    <div class="row g-3 mb-5">
        <div class="col-md-3">
            <div class="card p-3 shadow-sm bg-primary text-white">
                <h5 class="card-title">Usuarios Totales</h5>
                <p class="fs-4">{{ $totalUsuarios ?? 0 }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 shadow-sm bg-success text-white">
                <h5 class="card-title">Médicos Registrados</h5>
                <p class="fs-4">{{ $totalMedicos ?? 0 }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 shadow-sm bg-info text-dark">
                <h5 class="card-title">Pacientes Registrados</h5>
                <p class="fs-4">{{ $totalPacientes ?? 0 }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 shadow-sm bg-warning text-dark">
                <h5 class="card-title">Citas Pendientes</h5>
                <p class="fs-4">{{ $citasPendientes ?? 0 }}</p>
            </div>
        </div>
    </div>

    {{-- Gestión de Médicos --}}
    <div class="card shadow-sm mb-5">
        <div class="card-header fw-bold bg-secondary text-white">Gestión de Médicos ({{ $medicos->count() }})</div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Centro Asignado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicos as $medico)
                        <tr>
                            <td>{{ $medico->id }}</td>
                            <td>{{ $medico->user->name ?? 'N/A' }}</td>
                            <td>{{ $medico->especialidad->nombre ?? 'Sin especificar' }}</td>
                            <td>{{ $medico->centroSalud->nombre ?? 'Sin Asignar' }}</td>
                            <td>
                                <button class="btn btn-sm btn-info text-white">Ver</button>
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No hay médicos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Gestión de Pacientes --}}
    <div class="card shadow-sm">
        <div class="card-header fw-bold bg-light">Gestión de Pacientes ({{ $pacientes->count() }})</div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pacientes as $paciente)
                        <tr>
                            <td>{{ $paciente->id }}</td>
                            <td>{{ $paciente->user->name ?? 'N/A' }}</td>
                            <td>{{ $paciente->user->email ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No hay pacientes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection