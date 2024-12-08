@extends('layouts.app') <!-- Asegúrate de que este sea el nombre correcto de tu layout -->

@section('content')
    <div class="container">
        <h1 class="text-center">Informe de Gestión de Conductores</h1>
        
        <h2>Detalles del Informe</h2>
        <div class="info" style="margin: 20px 0; padding: 10px; border: 1px solid #4CAF50; border-radius: 5px; background-color: #f9f9f9;">
            <p><strong>Mes:</strong> {{ $mes }}</p>
            <p><strong>Clave:</strong> {{ $clave }}</p>
            <p><strong>Conductor:</strong> {{ $conductor }}</p>
        </div>

        <div class="footer" style="margin-top: 40px; text-align: center; font-size: 12px; color: #777;">
            <p>Este informe fue generado automáticamente.</p>
        </div>
    </div>
@endsection

