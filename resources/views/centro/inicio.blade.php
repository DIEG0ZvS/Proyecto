@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Panel del Centro de Salud</h2>
        <p class="text-muted mb-0">
            Bienvenido, {{ auth()->user()->name }} ({{ auth()->user()->rol }})
        </p>
    </div>

    <div class="row g-4">
        {{-- TABLA: Médicos --}}
        <div class="col-lg-6">
            <div class="card shadow-sm border-0" style="border-radius: 14px;">
                <div class="card-header fw-bold"
                     style="background-color: #B6CEB4; border-radius: 14px 14px 0 0;">
                    Médicos registrados
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0 align-middle">
                        <thead style="background-color: #D9E9CF;">
                            <tr>
                                <th>Nombre</th>
                                <th>Especialidad</th>
                                <th>Teléfono</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicos as $medico)
                                <tr>
                                    <td>{{ $medico['nombre'] }}</td>
                                    <td>{{ $medico['especialidad'] }}</td>
                                    <td>{{ $medico['telefono'] }}</td>
                                    <td>
                                        <span class="badge rounded-pill text-dark"
                                              style="background-color: #D9E9CF;">
                                            {{ $medico['estado'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- TABLA: Citas del día --}}
        <div class="col-lg-6">
            <div class="card shadow-sm border-0" style="border-radius: 14px;">
                <div class="card-header fw-bold"
                     style="background-color: #B6CEB4; border-radius: 14px 14px 0 0;">
                    Citas del día en el centro
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0 align-middle">
                        <thead style="background-color: #D9E9CF;">
                            <tr>
                                <th>Hora</th>
                                <th>Paciente</th>
                                <th>Médico</th>
                                <th>Especialidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($citas as $cita)
                                <tr>
                                    <td>{{ $cita['hora'] }}</td>
                                    <td>{{ $cita['paciente'] }}</td>
                                    <td>{{ $cita['medico'] }}</td>
                                    <td>{{ $cita['especialidad'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
