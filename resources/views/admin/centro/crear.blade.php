@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Registrar Nuevo Centro de Salud</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.centros.store') }}">
                        @csrf

                        {{-- DATOS DEL CENTRO --}}
                        <div class="mb-3">
                            <label class="fw-bold">Nombre del Centro de Salud</label>
                            <input type="text" name="nombre_centro" class="form-control @error('nombre_centro') is-invalid @enderror" value="{{ old('nombre_centro') }}" required>
                            @error('nombre_centro')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Dirección</label>
                            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}" required>
                            @error('direccion')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <hr>
                        
                        {{-- CREDENCIALES DE ACCESO --}}
                        <h5 class="mb-3 text-danger">Credenciales de Acceso</h5>

                        <div class="mb-3">
                            <label class="fw-bold">Correo Electrónico (Para Login)</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Contraseña</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success text-white fw-bold">
                                Guardar Centro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection