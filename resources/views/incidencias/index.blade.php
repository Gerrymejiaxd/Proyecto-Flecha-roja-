blade

Verify
Copy code
@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{ route('conductores.gestion') }}" class="btn btn-secondary mb-3">Regresar</a>
    
    <h2>Lista de Conductores</h2>

    @if($conductores->isEmpty())
        <p>No hay conductores registrados.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Conductor</th>
                    <th>Fecha de Ingreso</th>
                    <th>Rol</th>
                    <th>Zona</th>
                    <th>Estatus</th>
                    <th>Clasificación</th>
                    <th>Tecnología</th>
                    <th>E-mail</th>
                    <th>CURP</th>
                    <th>RFC</th>
                    <th>No. IMSS</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Edad</th>
                    <th>Teléfono</th>
                    <th>Municipio</th>
                    <th>Estado</th>
                    <th>Domicilio</th>
                    <th>Historial de Trabajo</th>
                    <th>Tipo de Ingreso</th>
                    <th>Vigencia de Licencia</th>
                    <th>Fecha Psicofísico</th>
                    <th>Antigüedad de Licencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conductores as $conductor)
                    <tr>
                        <td>{{ $conductor->clave }}</td>
                        <td>{{ $conductor->conductor }}</td>
                        <td>{{ $conductor->fecha_ingreso }}</td>
                        <td>{{ $conductor->rol }}</td>
                        <td>{{ $conductor->zona }}</td>
                        <td>{{ $conductor->estatus }}</td>
                        <td>{{ $conductor->clasificacion }}</td>
                        <td>{{ $conductor->tecnologia }}</td>
                        <td>{{ $conductor->email }}</td>
                        <td>{{ $conductor->curp }}</td>
                        <td>{{ $conductor->rfc }}</td>
                        <td>{{ $conductor->no_imss }}</td>
                        <td>{{ $conductor->fecha_nacimiento }}</td>
                        <td>{{ $conductor->edad }}</td>
                        <td>{{ $conductor->telefono }}</td>
                        <td>{{ $conductor->municipio }}</td>
                        <td>{{ $conductor->estado }}</td>
                        <td>{{ $conductor->domicilio }}</td>
                        <td>{{ $conductor->historial_trabajo }}</td>
                        <td>{{ $conductor->tipo_ingreso }}</td>
                        <td>{{ $conductor->fecha_vencimiento }}</td>
                        <td>{{ $conductor->psicofisico }}</td>
                        <td>{{ $conductor->antig_licencia }}</td>
                        <td>
                            <form action="{{ route('conductores.gestion', $conductor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Dar de baja</button>
                            </form>
                            <a href="{{ route('conductores.alta', $conductor->id) }}" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2 class="mt-5">Lista de Incidencias</h2>

    @if ($incidencias->isEmpty())
        <p>No hay incidencias registradas.</p>
    @else
        <ul>
            @foreach ($incidencias as $incidencia)
                <li>
                    <a href="{{ route('informes.mostrar', ['id' => $incidencia->id]) }}">
                        Ver Informe de {{ $incidencia->item }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

</div>
@endsection


