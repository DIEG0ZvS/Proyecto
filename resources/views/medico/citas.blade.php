@extends('layouts.app')

@section('content')
<div class="container">
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
                <td>{{ $c->fecha_hora->format('d/m/Y') }}</td>
                <td>{{ $c->fecha_hora->format('H:i') }}</td>
                <td>{{ ucfirst($c->tipo) }}</td>
                <td>{{ ucfirst($c->estado) }}</td>
                <td>
                    @if($c->tipo === 'teleconsulta')
                        <a href="{{ route('medico.teleconsulta', $c->id) }}" class="btn btn-sm btn-warning me-2">
                            Teleconsulta
                        </a>
                    @endif

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