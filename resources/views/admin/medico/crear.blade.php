@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Registrar Nuevo Médico</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.medicos.store') }}">
                        @csrf

                        <h5 class="mb-3">Datos de Cuenta (Acceso)</h5>
                        <div class="mb-3">
                            <label>Nombre Completo</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <hr>
                        <h5 class="mb-3">Datos Profesionales</h5>
                        
                        <div class="mb-3">
                            <label>Número de Colegiatura (CMP)</label>
                            <input type="text" name="num_colegiatura" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Teléfono</label>
                            <input type="text" name="telefono" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Especialidad</label>
                            <select name="especialidad_id" class="form-select" required>
                                <option value="">Seleccione...</option>
                                @foreach($especialidades as $especialidad)
                                    <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Centro de Salud (Opcional)</label>
                            <select name="centro_salud_id" class="form-select">
                                <option value="">Ninguno (Independiente)</option>
                                @foreach($centros as $centro)
                                    <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Guardar Médico</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection