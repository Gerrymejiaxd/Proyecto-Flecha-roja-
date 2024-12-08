@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Baja de Conductores</h2>
    <a href="{{ route('conductores.gestion') }}" class="btn btn-secondary mb-3">Regresar</a>
    <form action="{{ route('conductores.gestion') }}" method="GET"> <!-- Cambiado a GET y a la ruta index -->
        <div class="form-group">
            <label for="clave">Clave del Conductor:</label>
            <input type="text" name="clave" class="form-control" value="{{ request('clave') }}">
            <label for="nombre">Nombre del Conductor:</label>
            <input type="text" name="nombre" class="form-control" value="{{ request('nombre') }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    @if(request()->has('clave') || request()->has('nombre')) <!-- Verifica si se ha enviado la búsqueda -->
        @if(isset($conductores) && count($conductores) > 0)
            <h3>Resultados de la Búsqueda</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($conductores as $conductor)
                        <tr>
                            <td>{{ $conductor->clave }}</td>
                            <td>{{ $conductor->nombre }}</td>
                            <td>
                                <form action="{{ route('conductores.darBaja', $conductor->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Dar de Baja</button>
                                </form>
                                <a href="{{ route('conductores.gestion') }}" class="btn btn-secondary">Cancelar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No se encontraron conductores.</p>
        @endif
    @endif
</div>
@endsection

