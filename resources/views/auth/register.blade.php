@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-md-6">

        <div class="card shadow-sm border-0" style="border-radius: 14px;">
            <div class="card-header text-center fw-bold text-white"
                 style="background-color: #96A78D; border-radius: 14px 14px 0 0;">
                Crear cuenta
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nombre completo</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    {{-- Rol --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Rol</label>
                        <select name="rol" class="form-select" required>
                            <option value="paciente">Paciente</option>
                        </select>
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    {{-- Confirmación --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    {{-- Botón --}}
                    <div class="d-grid">
                        <button type="submit" class="btn fw-bold text-white"
                                style="background-color: #96A78D; border-color: #96A78D;">
                            Registrar
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        ¿Ya tienes cuenta?
                        <a href="{{ route('login') }}" style="color: #96A78D; font-weight: 600;">
                            Inicia sesión
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
