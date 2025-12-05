@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Título ajustado para reflejar que son todas las citas programadas --}}
    <h2>Agenda de Citas Programadas</h2>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citas as $c)
            <tr>
                <td>{{ $c->paciente->user->name ?? ($c->paciente->user->email ?? '—') }}</td>
                
                {{-- NUEVA COLUMNA: Mostrar solo la fecha (Ej: 05/12/2025) --}}
                <td>{{ $c->fecha_hora->format('d/m/Y') }}</td>
                
                {{-- HORA: Mostrar solo la hora (Ej: 14:30) --}}
                <td>{{ $c->fecha_hora->format('H:i') }}</td>
                
                <td>{{ ucfirst($c->tipo) }}</td>
                <td>{{ ucfirst($c->estado) }}</td>
                <td>
                    {{-- Botón para iniciar teleconsulta (si aplica) --}}
                    @if($c->tipo === 'teleconsulta')
                        <a href="{{ route('medico.teleconsulta', $c->id) }}" class="btn btn-sm btn-warning me-2">
                            Teleconsulta
                        </a>
                    @endif

                    {{-- Botón para finalizar la cita y escribir diagnóstico --}}
                    <a href="{{ route('medico.citas.finalizar', $c->id) }}" class="btn btn-sm btn-success">
                        Finalizar Cita
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection