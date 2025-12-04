@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Finalizar consulta - Cita #{{ $cita->id }}</h2>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Paciente:</strong> {{ $cita->paciente->user->name ?? ($cita->paciente->user->email ?? '-') }}</p>
            <p><strong>Fecha/Hora:</strong> {{ \Carbon\Carbon::parse($cita->fecha_hora)->format('Y-m-d H:i') }}</p>

            <form method="POST" action="{{ route('medico.citas.finalizar.store', $cita->id) }}">
                @csrf

                <div class="mb-3">
                    <label for="diagnostico" class="form-label">Diagnóstico</label>
                    <textarea name="diagnostico" id="diagnostico" class="form-control" rows="6" required>{{ old('diagnostico', $cita->diagnostico) }}</textarea>
                    @error('diagnostico')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('medico.teleconsulta', $cita->id) }}" class="btn btn-secondary">Volver</a>
                    <button class="btn btn-success" type="submit">Guardar y finalizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
