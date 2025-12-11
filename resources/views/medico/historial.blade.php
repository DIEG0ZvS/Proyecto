@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Historial de pacientes</h2>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Diagnóstico</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historial as $h)
            <tr>
                <td>{{ $h->paciente->user->name ?? ($h->paciente->user->email ?? '—') }}</td>
                <td>{{ \Carbon\Carbon::parse($h->fecha_hora)->format('Y-m-d H:i') }}</td>
                <td>{{ optional($h->diagnostico)->diagnostico ?? '—' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
