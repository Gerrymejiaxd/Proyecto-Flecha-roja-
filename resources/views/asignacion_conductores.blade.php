@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Asignación a Conductores</h2>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Item</th>
                <th>Clave</th>
                <th>Conductor</th>
                <th>Unidad</th>
                <th>Ingreso</th>
                <th>Vigencia</th>
                <th>Licencia</th>
                <th>Psicofísico</th>
                <th>Antig. Licencia</th>
                <th>Zona</th>
                <th>Rol</th>
                <th>Estatus Tecnología</th>
                <th>Teléfono</th>
                <th>Incidencias</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conductores as $conductor)
            <tr>
                <td>{{ $conductor->item }}</td>
                <td>{{ $conductor->clave }}</td>
                <td>{{ $conductor->nombre }}</td>
                <td>{{ $conductor->unidad }}</td>
                <td>{{ $conductor->ingreso }}</td>
                < td>{{ $conductor->vigencia }}</td>
                <td>{{ $conductor->licencia }}</td>
                <td>{{ $conductor->psicofisico }}</td>
                <td>{{ $conductor->antiguedad_licencia }}</td>
                <td>{{ $conductor->zona }}</td>
                <td>{{ $conductor->rol }}</td>
                <td>{{ $conductor->estatus_tecnologia }}</td>
                <td>{{ $conductor->telefono }}</td>
                <td>{{ $conductor->incidencias }}</td>
                <td>
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
                <h5 class="modal-title" id="modalModificarLabel">Modificar Información del Conductor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formModificar">
                    <input type="hidden" name="conductor_id" id="conductor_id">
                    <div class="form-group">
                        <label for="unidad">Unidad</label>
                        <input type="text" class="form-control" name="unidad" id="unidad" required>
                    </div>
                    <div class="form-group">
                        <label for="zona">Zona</label>
                        <input type="text" class="form-control" name="zona" id="zona" required>
                    </div>
                    <div class="form-group">
                        <label for="estatus">Estatus</label>
                        <input type="text" class="form-control" name="estatus" id="estatus" required>
                    </div>
                    <div class="form-group">
                        <label for="incidencias">Incidencias</label>
                        <input type="text" class="form-control" name="incidencias" id="incidencias" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarCambios()">Guardar</button>
                <button type="button" class="btn btn-success" onclick="generarPDF()">Generar PDF</button>
            </div>
        </div>
    </div>
</div>

<script>
    function abrirModal(conductorId) {
        document.getElementById('conductor_id').value = conductorId;
        $('#modalModificar').modal('show');
    }

    function guardarCambios() {
        const form = document.getElementById('formModificar');
        const formData = new FormData(form);
        fetch('/ruta/a/tu/api/para/modificar', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' 
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                $('#modalModificar').modal('hide');
                location.reload(); 
            } else {
                alert('Error al guardar los cambios: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function generarPDF(tipoInforme) {
        if (tipoInforme === 'recursos_humanos') {
            window.location.href = 'conductores/pdf/recursos-humanos';
        } else if (tipoInforme === 'gestion_conductores') {
            window.location.href = 'conductores/pdf/gestion-conductores';
        } else {
            alert('Tipo de informe no válido.');
        }
    }
</script>
@endsection


