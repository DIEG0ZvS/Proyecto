@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Panel de Médico</h2>
        <p class="text-muted mb-0">
            Bienvenido, {{ auth()->user()->name }} ({{ auth()->user()->rol }})
        </p>
    </div>

    <div class="row g-4">
        {{-- FORMULARIO: Disponibilidad --}}
        <div class="col-lg-5">
            <div class="card shadow-sm border-0" style="border-radius: 14px;">
                <div class="card-header fw-bold text-white"
                     style="background-color: #96A78D; border-radius: 14px 14px 0 0;">
                    Actualizar disponibilidad
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Día</label>
                            <select class="form-select">
                                <option>Lunes</option>
                                <option>Martes</option>
                                <option>Miércoles</option>
                                <option>Jueves</option>
                                <option>Viernes</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Turno</label>
                            <select class="form-select">
                                <option>Mañana</option>
                                <option>Tarde</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Hora inicio</label>
                            <input type="time" class="form-control">
                        </div>

                        <button type="button" class="btn w-100 fw-bold text-white"
                                style="background-color: #96A78D; border-color: #96A78D;">
                            Guardar disponibilidad
                        </button>
                        <small class="text-muted d-block mt-2">
                            * Solo muestra el diseño, aún no guarda en base de datos.
                        </small>
                    </form>
                </div>
            </div>
        </div>

        {{-- TABLA: Citas del día --}}
        <div class="col-lg-7">
            <div class="card shadow-sm border-0" style="border-radius: 14px;">
                <div class="card-header fw-bold"
                     style="background-color: #B6CEB4; border-radius: 14px 14px 0 0;">
                    Citas del día
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0 align-middle">
                        <thead style="background-color: #D9E9CF;">
                            <tr>
                                <th>Hora</th>
                                <th>Paciente</th>
                                <th>Motivo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($citasHoy as $cita)
                                <tr>
                                    <td>{{ $cita['hora'] }}</td>
                                    <td>{{ $cita['paciente'] }}</td>
                                    <td>{{ $cita['motivo'] }}</td>
                                    <td>
                                        <span class="badge rounded-pill text-dark"
                                              style="background-color: #D9E9CF;">
                                            {{ $cita['estado'] }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        No hay citas programadas para hoy.
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

