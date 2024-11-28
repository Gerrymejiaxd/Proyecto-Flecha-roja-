@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Conductores</h1>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Seleccionar Opción
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('conductores.alta') }}">Alta</a>
            <a class="dropdown-item" href="{{ route('conductores.baja') }}">Baja</a>
            <a class="dropdown-item" href="{{ route('conductores.busqueda') }}">Búsqueda</a>
        </div>
    </div>
</div>
@endsection
