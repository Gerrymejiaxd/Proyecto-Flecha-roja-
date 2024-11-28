@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Gestión de Conductores - Búsqueda</h2>
    
    <div class="search-container mb-4">
        <input type="text" class="form-control d-inline-block" placeholder="Ingrese el nombre o clave del conductor" id="search-input" style="width: auto; display: inline-block;">
        <button type="button" class="btn btn-primary" onclick="buscarConductor()">
            <i class="fas fa-search"></i> Buscar
        </button>
        <button type="button" class="btn btn-secondary" onclick="limpiarBusqueda()">
            <i class="fas fa-broom"></i> Limpiar
        </button>
        <button type="button" class="btn btn-danger" onclick="exportarPDF()">
            <i class="fas fa-file-pdf"></i> Exportar PDF
        </button>
    </div>

    <div class="filter-options mb-4">
        <select class="form-select d-inline-block" name="zona" id="zona" style="width: auto;">
            <option value="">Filtrar por Zona</option>
            <option value="norte">Norte</option>
            <option value="sur">Sur</option>
        </select>

        <select class="form-select d-inline-block" name="estatus" id="estatus" style="width: auto;">
            <option value="">Filtrar por Estatus</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>

        <select class="form-select d-inline-block" name="tipo_contratacion" id="tipo_contratacion" style="width: auto;">
            <option value="">Filtrar por Tipo de Contratación</option>
            <option value="fijo">Fijo</option>
            <option value="temporal">Temporal</option>
        </select>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>Clave</th>
                <th>Conductor</th>
                <th>Fecha de Ingreso</th>
                <th>Rol</th>
                <th>Zona</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody id="resultados">
            <!-- Aquí se llenarán los resultados de la búsqueda -->
        </tbody>
    </table>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
    function buscarConductor() {
        alert("Buscando conductor...");
    }

    function limpiarBusqueda() {
        document.getElementById('search-input').value = '';
        document.getElementById('zona').value = '';
        document.getElementById('estatus').value = '';
        document.getElementById('tipo_contratacion').value = '';
        document.getElementById('resultados').innerHTML = '';
    }

    function exportarPDF() {
        alert("Exportando a PDF...");
    }
</script>
@endsection
