@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Mensajes de éxito o error --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Panel de Paciente</h2>
        <p class="text-muted mb-0">
            Bienvenido, {{ auth()->user()->name }}
        </p>
    </div>

    <div class="row g-4">
        {{-- FORMULARIO: Reservar cita --}}
        <div class="col-lg-5">
            <div class="card shadow-sm border-0" style="border-radius: 14px;">
                <div class="card-header fw-bold text-white" 
                     style="background-color: #96A78D; border-radius: 14px 14px 0 0;">
                    Reservar nueva cita
                </div>
                <div class="card-body" style="background-color: #FFFFFF;">
                    
                    {{-- INICIO DEL FORMULARIO CONECTADO --}}
                    <form action="{{ route('paciente.reservar') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Médico / Especialidad</label>
                            <select name="medico_id" class="form-select" required>
                                <option value="">Seleccione un médico…</option>
                                @foreach($medicos as $medico)
                                    <option value="{{ $medico->id }}">
                                        {{ $medico->user->name }} - {{ $medico->especialidad->nombre ?? 'General' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label fw-semibold">Fecha</label>
                                <input type="date" name="fecha" class="form-control" required min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold">Hora</label>
                                <input type="time" name="hora" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Modalidad</label>
                            <select name="tipo" class="form-select">
                                <option value="presencial">Presencial</option>
                                <option value="teleconsulta">Teleconsulta</option> </select>
                        </div>

                        <button type="submit" class="btn w-100 fw-bold text-white"
                                style="background-color: #96A78D; border-color: #96A78D;">
                            Solicitar cita
                        </button>
                    </form>
                    {{-- FIN DEL FORMULARIO --}}
                    
                </div>
            </div>
        </div>

        {{-- TABLA: Mis citas --}}
        <div class="col-lg-7">
            <div class="card shadow-sm border-0" style="border-radius: 14px;">
                <div class="card-header fw-bold"
                     style="background-color: #B6CEB4; border-radius: 14px 14px 0 0;">
                    Mis citas
                </div>
                <div class="card-body p-0" style="background-color: #FFFFFF;">
                    <table class="table mb-0 align-middle">
                        <thead style="background-color: #D9E9CF;">
                            <tr>
                                <th>Fecha y Hora</th>
                                <th>Médico</th>
                                <th>Especialidad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($citas as $cita)
                                <tr>
                                    {{-- Acceso a propiedades del OBJETO (BD), no array --}}
                                    <td>{{ $cita->fecha_hora }}</td>
                                    <td>{{ $cita->medico->user->name ?? 'Médico no disponible' }}</td>
                                    <td>{{ $cita->medico->especialidad->nombre ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge rounded-pill text-dark"
                                              style="background-color: #D9E9CF;">
                                            {{ ucfirst($cita->estado) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">
                                        No tienes citas registradas aún.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection