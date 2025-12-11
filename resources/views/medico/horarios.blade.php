@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mis horarios</h2>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Día</th>
                <th>Inicio</th>
                <th>Fin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $h)
            <tr>
                <td>{{ $h['dia'] }}</td>
                <td>{{ $h['hora_inicio'] }}</td>
                <td>{{ $h['hora_fin'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <h4>Agregar nuevo horario</h4>
    <form method="POST" action="{{ route('medico.horarios.guardar') }}">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input name="dia" class="form-control" placeholder="Día" required>
            </div>
            <div class="col-md-3">
                <input name="inicio" type="time" class="form-control" required>
            </div>
            <div class="col-md-3">
                <input name="fin" type="time" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success w-100">Guardar</button>
            </div>
        </div>
    </form>

</div>
@endsection
