@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Conductores</h1>
    
    <div role="alert">
    ¡Bienvenido a la sección de gestión de conductores! Aquí puedes administrar todas las operaciones relacionadas con los conductores de manera eficiente y organizada. 
    En esta plataforma, tendrás la capacidad de agregar nuevos conductores, editar la información existente, y eliminar registros que ya no sean necesarios. 
    Además, podrás visualizar informes detallados sobre el rendimiento de cada conductor, así como gestionar sus horarios y asignaciones. 
    Si necesitas ayuda, no dudes en consultar la documentación o ponerte en contacto con el soporte técnico. ¡Comencemos a optimizar la gestión de tus conductores!
    </div>

    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Seleccionar Opción
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('usuarios.gestionar') }}">Gestion U.</a>
            <a class="dropdown-item" href="{{ route('conductores.alta') }}">Alta</a>
            <a class="dropdown-item" href="{{ route('conductores.baja') }}">Baja</a>
            <a class="dropdown-item" href="{{ route('conductores.busqueda') }}">Búsqueda</a>
            <a class="dropdown-item" href="{{ route('conductores.informes') }}">Informes</a>
            <a class="dropdown-item" href="{{ route('informes.index') }}">Informes Generales</a>
            <a class="dropdown-item" href="{{ route('asignacion_conductores.index') }}">Asignación Conductores</a>
            <a class="dropdown-item" href="{{ route('servicio_medico.index') }}">Servicio Médico</a>
        </div>
    </div>
</div>
@endsection


