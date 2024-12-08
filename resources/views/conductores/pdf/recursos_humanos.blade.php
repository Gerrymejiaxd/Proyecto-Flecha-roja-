@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Informe de Recursos Humanos</h1>
        <div class="info mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Colaborador</th>
                        <th>Fecha Incidencia</th>
                        <th>Fecha Baja</th>
                        <th>Incidencia</th>
                        <th>Observación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $clave }}</td>
                        <td>{{ $colaborador }}</td>
                        <td>{{ $fecha_incidencia }}</td>
                        <td>{{ $fecha_baja }}</td>
                        <td>{{ $incidencia }}</td>
                        <td>{{ $observacion }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer mt-5">
            <p class="text-center">Generado el {{ date('d/m/Y H:i') }}</p>
        </div>
    </div>
@endsection



