@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Panel del Centro de Salud: {{ $centro->nombre }}</h2>

    {{-- Resumen Rápido --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm bg-info text-white">
                <h4>Médicos Activos</h4>
                <p class="fs-4">{{ $medicos->count() }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm bg-success text-white">
                <h4>Citas para Hoy</h4>
                <p class="fs-4">{{ $citasHoy->count() }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm bg-warning">
                <h4>Dirección</h4>
                <p class="fs-5">{{ $centro->direccion }}</p>
            </div>
        </div>
    </div>

    {{-- Citas Programadas para Hoy --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header fw-bold bg-secondary text-white">Citas de Hoy</div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Médico</th>
                        <th>Paciente</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($citasHoy as $cita)
                        <tr>
                            <td>{{ $cita->fecha_hora->format('H:i') }}</td>
                            <td>{{ $cita->medico->user->name ?? 'N/A' }}</td>
                            <td>{{ $cita->paciente->user->name ?? 'N/A' }}</td>
                            <td><span class="badge bg-warning">{{ ucfirst($cita->estado) }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No hay citas programadas para hoy.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Listado de Médicos del Centro --}}
    <div class="card shadow-sm">
        <div class="card-header fw-bold bg-light">Médicos Asociados</div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Colegiatura</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicos as $medico)
                        <tr>
                            <td>{{ $medico->user->name ?? 'N/A' }}</td>
                            <td>{{ $medico->especialidad->nombre ?? 'Sin especificar' }}</td>
                            <td>{{ $medico->num_colegiatura }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">No hay médicos asociados a este centro.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection