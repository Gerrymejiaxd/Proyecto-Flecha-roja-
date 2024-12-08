@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Informe de Gestión de Conductores</h1>
        <div class="info mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Colaborador</th>
                        <th>Unidad</th>
                        <th>Ingreso</th>
                        <th>Vigencia</th>
                        <th>Licencia</th>
                        <th>Psicofísico</th>
                        <th>Antig. Licencia</th>
                        <th>Zona</th>
                        <th>Rol</th>
                        <th>Estatus</th>
                        <th>Tecnologías</th>
                        <th>Teléfono</th>
                        <th>Incidencias</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $clave }}</td>
                        <td>{{ $colaborador }}</td>
                        <td>{{ $unidad }}</td>
                        <td>{{ $ingreso }}</td>
                        <td>{{ $vigencia }}</td>
                        <td>{{ $licencia }}</td>
                        <td>{{ $psicofisico }}</td>
                        <td>{{ $antiguedad_licencia }}</td>
                        <td>{{ $zona }}</td>
                        <td>{{ $rol }}</td>
                        <td>{{ $estatus }}</td>
                        <td>{{ $tecnologias }}</td>
                        <td>{{ $telefono }}</td>
                        <td>{{ $incidencias }}</td>
                        <td>{{ $acciones }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer mt-5">
            <p class="text-center">Generado el {{ date('d/m/Y H:i') }}</p>
        </div>
    </div>
@endsection


