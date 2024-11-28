<!DOCTYPE html>
<html>
<head>
    <title>Baja de Conductores</title>
    <style>
        
    </style>
</head>
<body>
    <h1>Lista de Conductores - Baja</h1>
    <table>
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
</body>
</html>