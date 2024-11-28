@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Gestión de Conductores</h1>

    <a href="{{ route('conductores.create') }}" class="btn btn-primary">Agregar Conductor</a>

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
                        <a href="{{ route('conductores.edit', $conductor->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('conductores.destroy', $conductor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection