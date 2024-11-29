<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Conductores</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f8f9fa; /* Color de fondo general */
        }
        .header {
            background-color: #316961; /* Color de la barra de cabeza */
            padding: 20px; /* Espaciado interno */
            display: flex; /* Usar flexbox para alinear elementos */
            align-items: center; /* Centrar verticalmente */
        }
        .header img {
            height: 100px; /* Ajusta la altura del logo según sea necesario */
            margin-right:-160px; /* Espacio entre el logo y el texto */
        }
        .header h1 {
            margin: 0; /* Sin margen */
            font-size: 24px; /* Tamaño de fuente */
            font-family:Arial;
            font-size= '12'; 
            color: #f8f9fa; /* Color del texto */
            flex-grow: 1; /* Permite que el texto ocupe el espacio restante */
            text-align: center; /* Centrar el texto */
        }
        nav {
            margin-left: 20px; /* Espacio a la izquierda del menú */
        }
        nav ul {
            list-style-type: none; /* Quitar viñetas de la lista */
            margin: 0; /* Sin margen */
            padding: 0; /* Sin padding */
            display: flex; /* Usar flexbox para alinear los elementos del menú */
        }
        nav ul li {
            margin-right: 30px; /* Espacio entre los elementos del menú */
        }
        nav ul li a {
            text-decoration: none; /* Sin subrayado en los enlaces */
            color: #000; /* Color del texto del menú */
        }
        main {
            width: 100%; /* Asegúrate de que el main ocupe todo el ancho */
            overflow: hidden; /* Oculta cualquier parte de la imagen que se desborde */
        }
        main img {
            width: 100%; /* La imagen ocupará el 100% del ancho del contenedor */
            height: auto; /* Mantiene la proporción de la imagen */
            object-fit: cover; /* Cubre todo el contenedor, recortando si es necesario */
        }
        footer {
            text-align: center; /* Centra el texto del pie de página */
            padding: 20px; /* Espaciado interno */
            background-color: #316961; /* Color de fondo del pie de página */
            color: #f8f9fa;
            position: relative; /* Para que el pie de página esté en la parte inferior */
            bottom: 0; /* Alinea el pie de página al fondo */
            width: 100%; /* Asegúrate de que el pie de página ocupe todo el ancho */
        }
    </style>
</head>
<body>
    <header class="header">
        <img src="{{ asset('logo2.jpeg') }}" alt="Logo"> <!-- Ruta del logo -->
        <h1>PORTAL DE GESTION DE CONDUCTORES</h1> <!-- Texto centrado -->
        <nav> 
            <ul>
                @if(Auth::check())
                <li><a href="{{ route('servicio_medico.index') }}">Servicio Médico</a></li>
                <li><a href="{{ route('asignacion_conductores.index') }}">Asignación Conductores</a></li>
                @else 
                <button><a href="{{ route('login') }}">Logout</a></button>
                @endif
            </ul>
        </nav>
    </header>

    <main>
        <img src="{{ asset('autobuses.jpeg') }}" alt="Imagen"> 
        @yield('content')
    </main>

    <footer>
        Autotransportes Flecha Roja Mexico Toluca San Luis Metepec Queretaro S.A de C.V
    </footer>
</body>
</html>
