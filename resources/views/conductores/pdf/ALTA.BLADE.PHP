<!DOCTYPE html>
<html>
<head>
    <title>Alta de Conductores</title>
    <style>
        /* Aquí puedes añadir estilos para el PDF */
    </style>
</head>
<body>
    <h1>Lista de Conductores - Alta</h1>
    <table>
        <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre del conductor</th>
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