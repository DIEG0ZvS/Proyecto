@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Panel de Administrador</h2>
        <p class="text-muted mb-0">
            Bienvenido, {{ auth()->user()->name }} ({{ auth()->user()->rol }})
        </p>
    </div>

   
    <div class="card shadow-sm border-0 mb-4" style="border-radius: 14px;">
        <div class="card-header fw-bold text-white"
             style="background-color: #96A78D; border-radius: 14px 14px 0 0;">
            Filtro de usuarios
        </div>
        <div class="card-body" style="background-color: #FFFFFF;">
            <form class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Rol</label>
                    <select class="form-select">
                        <option value="">Todos</option>
                        <option value="paciente">Paciente</option>
                        <option value="medico">Médico</option>
                        <option value="centro">Centro de salud</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Estado</label>
                    <select class="form-select">
                        <option value="">Todos</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="button" class="btn w-100 fw-bold text-white"
                            style="background-color: #96A78D; border-color: #96A78D;">
                        Aplicar filtro
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- TABLA: Usuarios --}}
    <div class="card shadow-sm border-0" style="border-radius: 14px;">
        <div class="card-header fw-bold"
             style="background-color: #B6CEB4; border-radius: 14px 14px 0 0;">
            Usuarios registrados
        </div>
        <div class="card-body p-0">
            <table class="table mb-0 align-middle">
                <thead style="background-color: #D9E9CF;">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario['nombre'] }}</td>
                            <td>{{ $usuario['email'] }}</td>
                            <td>{{ $usuario['rol'] }}</td>
                            <td>
                                <span class="badge rounded-pill text-dark"
                                      style="background-color: #D9E9CF;">
                                    {{ $usuario['estado'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
