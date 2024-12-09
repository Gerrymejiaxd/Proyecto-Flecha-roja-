@extends('layouts.app') 
@section('content')
<div class="container">
    <h2>Generar Informe</h2>

    <div class="form-group">
        <a href="{{ route('conductores.pdf.recursos_humanos') }}" class="btn btn-primary">Generar Informe de Recursos Humanos</a>
        <a href="{{ route('conductores.pdf.gestion_conductores') }}" class="btn btn-secondary">Generar Informe de Gestión de Conductores</a>
    </div>
</div>
@endsection

