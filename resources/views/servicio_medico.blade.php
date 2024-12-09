@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Informe de Gestión de Conductores</h2>
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
            @foreach($conductores as $conductor)
            <tr>
                <td>{{ $conductor->clave }}</td>
                <td>{{ $conductor->colaborador }}</td> 
                <td>{{ $conductor->ingreso }}</td>
                <td>{{ $conductor->vigencia }}</td>
                <td>{{ $conductor->licencia }}</td>
                <td>{{ $conductor->psicofisico }}</td>
                <td>{{ $conductor->antiguedad_licencia }}</td>
                <td>{{ $conductor->zona }}</td>
                <td>{{ $conductor->rol }}</td>
                <td>{{ $conductor->estatus }}</td>
                <td>{{ $conductor->tecnologias }}</td>
                <td>{{ $conductor->telefono }}</td>
                <td>{{ $conductor->incidencias }}</td>
                <td>{{ $conductor->acciones }}</td>
                            
                <button class="btn btn-warning" onclick="abrirModal('{{ $conductor->id }}')">Modificar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="modalModificarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarLabel">Modificar Incidencias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formModificarIncidencias" action="" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="conductor_id" id="conductor_id">
                    <div class="form-group">
                        <label for="incidencias">Incidencias</label>
                        <textarea class="form-control" name="incidencias" id="incidencias" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-success" onclick="generarPDF()">Generar PDF</button>
                </div>
            </form>
        </div>
        </div>
</div>

@endsection

@section('scripts')
<script>
    function abrirModal(id, incidencias) {
        document.getElementById('conductor_id').value = id;
        document.getElementById('incidencias').value = incidencias;
        document.getElementById('formModificarIncidencias').action = `/servicio-medico/actualizar/${id}`;
        $('#modalModificar').modal('show');
    }

    function generarPDF() {
        if (tipoInforme === 'recursos_humanos') {
            window.location.href = 'conductores/pdf/recursos.humanos';
        } else if (tipoInforme === 'gestion_conductores') {
            window.location.href = 'conductores/pdf/gestion.conductores';
        } else {
            alert('Tipo de informe no válido.');
        }
    }
</script>
@endsection

