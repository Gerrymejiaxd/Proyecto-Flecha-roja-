@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Baja de Conductores</h2>
    <form action="{{ route('conductores.baja') }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="clave">Clave del Conductor:</label>
            <input type="text" name="clave" class="form-control">
            <label for="nombre"> Nombre del Conductor:</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

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
                            <a href="{{ route('conductores.modificar', $conductor->id) }}" class="btn btn-warning">Modificar</a>
                            <form action="{{ route('conductores.darBaja', $conductor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Dar de Baja</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a href="{{ route('conductores.index') }}" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
