@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resultados de Búsqueda de Conductores</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $conductor)
                <tr>
                    <td>{{ $conductor->clave }}</td>
                    <td>{{ $conductor->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection