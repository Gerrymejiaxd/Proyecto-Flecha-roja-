@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Gestión de Conductores - Búsqueda</h2>
    <a href="{{ route('conductores.gestion') }}" class="btn btn-secondary mb-3">Regresar</a>
    <div class="search-container mb-4">
        <form action="{{ route('conductores.alta') }}" method="POST" id="search-form">
            <input type="text" class="form-control d-inline-block" name="search" placeholder="Ingrese el nombre o clave del conductor" id="search-input" style="width: auto; display: inline-block;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Buscar
            </button>
            <button type="button" class="btn btn-secondary" onclick="limpiarBusqueda()">
                <i class="fas fa-broom"></i> Limpiar
            </button>
            <button type="button" class="btn btn-danger" onclick="exportarPDF()">
                <i class="fas fa-file-pdf"></i> Exportar PDF
            </button>
        </form>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>Clave</th>
                <th>Conductor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="resultados">
            @foreach($conductores as $conductor)
                <tr>
                    <td>{{ $conductor->clave }}</td>
                    <td>{{ $conductor->nombre }}</td>
                    <td>
                        <a href="{{ route('conductores.modificar', $conductor->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('conductores.actualizar', $conductor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $conductores->links() }}
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    function limpiarBusqueda() {
        document.getElementById('search-input').value = '';
        document.getElementById('resultados').innerHTML = '';
        document.getElementById('search-form').submit();
    }

    function exportarPDF() {
        {{--TODO: FIX MISSING DATA --}}
        window.location = "{{ route('conductores.pdf.busqueda') }}";
    }
</script>
@endsection



