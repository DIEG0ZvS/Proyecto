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

                        <hr>
                        <h5 class="mb-3">Datos del Centro de Salud</h5>

                        <div class="mb-3">
                            <label>Nombre del Centro</label>
                            <input type="text" name="nombre_centro" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Dirección</label>
                            <input type="text" name="direccion" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Guardar Centro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
