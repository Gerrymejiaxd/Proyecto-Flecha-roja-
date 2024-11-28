<!DOCTYPE html>
<html>
<head>
    <title>Informe de Recursos Humanos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
            margin-top: 30px;
        }

        p {
            font-size: 14px;
            line-height: 1.6;
            margin: 5px 0;
        }

        .info {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <h1>Informe de Recursos Humanos</h1>
    
    <h2>Detalles del Informe</h2>
    <div class="info">
        <p><strong>Mes:</strong> {{ $mes }}</p>
        <p><strong>Clave:</strong> {{ $clave }}</p>
        <p><strong>Colaborador:</strong> {{ $colaborador }}</p>
        <p><strong>Fecha de Incidencia:</strong> {{ $fecha_incidencia }}</p>
        <p><strong>Fecha de Baja:</strong> {{ $fecha_baja }}</p>
    </div>

    <div class="footer">
        <p>Este informe fue generado automáticamente.</p>
    </div>
</body>
</html>


