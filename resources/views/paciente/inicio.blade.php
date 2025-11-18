@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Panel de Paciente</h2>
        <p class="text-muted mb-0">
            Bienvenido, {{ auth()->user()->name }} ({{ auth()->user()->rol }})
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
                    <form>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Especialidad</label>
                            <select class="form-select">
                                <option value="">Seleccione…</option>
                                <option>Medicina General</option>
                                <option>Pediatría</option>
                                <option>Ginecología</option>
                                <option>Odontología</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Médico</label>
                            <select class="form-select">
                                <option value="">Seleccione…</option>
                                <option>Dra. Ana Pérez</option>
                                <option>Dr. Juan López</option>
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label fw-semibold">Fecha</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold">Horario</label>
                                <select class="form-select">
                                    <option>09:00 - 10:00</option>
                                    <option>10:00 - 11:00</option>
                                    <option>16:00 - 17:00</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Modalidad</label>
                            <select class="form-select">
                                <option>Presencial</option>
                                <option>Teleconsulta</option>
                            </select>
                        </div>

                        <button type="button" class="btn w-100 fw-bold text-white"
                                style="background-color: #96A78D; border-color: #96A78D;">
                            Solicitar cita
                        </button>
                        <small class="text-muted d-block mt-2">
                            * Por ahora este formulario es solo de demostración.
                        </small>
                    </form>
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
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Médico</th>
                                <th>Especialidad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($citas as $cita)
                                <tr>
                                    <td>{{ $cita['fecha'] }}</td>
                                    <td>{{ $cita['hora'] }}</td>
                                    <td>{{ $cita['medico'] }}</td>
                                    <td>{{ $cita['especialidad'] }}</td>
                                    <td>
                                        <span class="badge rounded-pill text-dark"
                                              style="background-color: #D9E9CF;">
                                            {{ $cita['estado'] }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        No tienes citas registradas.
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

