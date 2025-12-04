@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Panel del Médico</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <a href="{{ route('medico.citas') }}" class="btn btn-success w-100">Citas del día</a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('medico.horarios') }}" class="btn btn-success w-100">Mis horarios</a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('medico.historial') }}" class="btn btn-success w-100">Historial de pacientes</a>
        </div>
    </div>
</div>
@endsection

