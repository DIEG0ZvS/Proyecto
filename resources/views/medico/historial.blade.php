@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Historial de Consultas</h2>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Fecha de Consulta</th>
                <th>Estado</th>
                <th>Diagnóstico</th> {{-- Nuevo título de columna --}}
            </tr>
        </thead>
        <tbody>
            @forelse($historial as $cita)
            <tr>
                {{-- Nombre del paciente --}}
                <td>{{ $cita->paciente->user->name ?? 'Paciente Desconocido' }}</td>
                
                {{-- Fecha de la consulta --}}
                <td>{{ $cita->fecha_hora->format('d/m/Y H:i') }}</td>
                
                {{-- Estado con badge --}}
                <td>
                    <span class="badge rounded-pill text-white {{ $cita->estado === 'completada' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($cita->estado) }}
                    </span>
                </td>
                
                {{-- Diagnóstico (se accede por la relación) --}}
                <td>
                    @if ($cita->estado === 'completada' && $cita->diagnostico)
                        {{ $cita->diagnostico->diagnostico }}
                        {{-- La fecha de emisión del diagnóstico es $cita->diagnostico->created_at --}}
                    @elseif ($cita->estado === 'cancelada')
                        Cita cancelada.
                    @else
                        N/A
                    @endif
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-muted">No hay historial de consultas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection