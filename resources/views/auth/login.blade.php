@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="col-md-5">

        <div class="card shadow-sm border-0" style="border-radius: 14px;">
            <div class="card-header text-center fw-bold text-white"
                 style="background-color: #96A78D; border-radius: 14px 14px 0 0;">
                Iniciar sesión
            </div>

            <div class="card-body" style="background-color: #FFFFFF;">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Correo electrónico</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Contraseña</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required>
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Remember --}}
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            Recordarme
                        </label>
                    </div>

                    {{-- Botón --}}
                    <div class="d-grid">
                        <button type="submit" class="btn fw-bold text-white"
                                style="background-color: #96A78D; border-color: #96A78D;">
                            Entrar
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        ¿No tienes cuenta?
                        <a href="{{ route('register') }}" style="color: #96A78D; font-weight: 600;">
                            Regístrate
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
