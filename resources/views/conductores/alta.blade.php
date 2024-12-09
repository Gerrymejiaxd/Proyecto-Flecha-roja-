@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route('conductores.gestion') }}" class="btn btn-secondary mb-3">Regresar </a>
    <h2>Alta de Conductores</h2>
    <form action="{{ route('conductores.guardar') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="clave">Clave:</label>
            <input type="text" name="clave" class="form-control" >
        </div>

        <div class="form-group">
            <label for="conductor">Conductor:</label>
            <input type="text" name="conductor" class="form-control" >
        </div>

        <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso:</label>
            <input type="date" name="fecha_ingreso" class="form-control" >
        </div>

        <div class="form-group">
            <label for="rol">Rol:</label>
            <input type="text" name="rol" class="form-control" >
        </div>

        <div class="form-group">
            <label for="zona">Zona:</label>
            <input type="text" name="zona" class="form-control" >
        </div>

        <div class="form-group">
            <label for="estatus">Estatus:</label>
            <select name="estatus" class="form-control" >
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="clasificacion">Clasificación:</label>
            <input type="text" name="clasificacion" class="form-control" >
        </div>

        <div class="form-group">
            <label for="tecnologia">Tecnología:</label>
            <select name="tecnologia" class="form-control" >
                <option value="scania">Scania</option>
                <option value="volvo">Volvo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" class="form-control" >
        </div>

        <div class="form-group">
            <label for="curp">CURP:</label>
            <input type="text" name="curp" class="form-control" >
        </div>

        <div class="form-group">
            <label for="rfc">RFC:</label>
            <input type="text" name="rfc" class="form-control" >
        </div>

        <div class="form-group">
            <label for="no_imss">No. IMSS:</label>
            <input type="text" name="no_imss" class="form-control" >
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" class="form-control" >
        </div>

        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" name="edad" class="form-control" >
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" class="form-control" >
        </div>

        <div class="form-group">
            <label for="municipio">Municipio:</label>
            <input type="text" name="municipio" class="form-control" >
        </div>

        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="">Seleccione un estado</option>
                <option value="Aguascalientes">Aguascalientes</option>
                <option value="Baja California">Baja California</option>
                <option value="Baja California Sur">Baja California Sur</option>
                <option value="Campeche">Campeche</option>
                <option value="Chiapas">Chiapas</option>
                <option value="Chihuahua">Chihuahua</option>
                <option value="Coahuila">Coahuila</option>
                <option value="Colima">Colima</option>
                <option value="Durango">Durango</option>
                <option value="Guanajuato">Guanajuato</option>
                <option value="Guerrero">Guerrero</option>
                <option value="Hidalgo">Hidalgo</option>
                <option value="Jalisco">Jalisco</option>
                <option value="Mexico">Estado de México</option>
                <option value="Michoacán">Michoacán</option>
                <option value="Morelos">Morelos</option>
                <option value="Nayarit">Nayarit</option>
                <option value="Nuevo León">Nuevo León</option>
                <option value="Oaxaca">Oaxaca</option>
                <option value="Puebla">Puebla</option>
                <option value="Querétaro">Querétaro</option>
                <option value="Quintana Roo">Quintana Roo</option>
                <option value="San Luis Potosí">San Luis Potosí</option>
                <option value="Sinaloa">Sinaloa</option>
                <option value="Sonora">Sonora</option>
                <option value="Tabasco">Tabasco</option>
                <option value="Tamaulipas">Tamaulipas</option>
                <option value="Tlaxcala">Tlaxcala</option>
                <option value="Veracruz">Veracruz</option>
                <option value="Yucatán">Yucatán</option>
                <option value="Zacatecas">Zacatecas</option>
            </select>
        </div>

        <div class="form-group">
            <label for="domicilio">Domicilio:</label>
            <input type="text" name="domicilio" class="form-control" >
        </div>

        <div class="form-group">
            <label for="historial_trabajo">Historial de Trabajo:</label>
            <textarea name="historial_trabajo" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="tipo_ingreso">Tipo de Ingreso:</label>
            <select name="tipo_ingreso" class="form-control">
                <option value="directo">Directo</option>
                <option value="formacion">Formación</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="vigencia_licencia">Vigencia de vigencia_licencia:</label>
            <input type="date" name="fecha_vencimiento" class="form-control">
        </div>

        <div class="form-group"> 
            <label for="psicofisico">Fecha psicofisico:</label>
            <input type="date" name="psicofisico" class="form-control">
        </div>
        
        <div class="form-group"> 
            <label for="antig_licencia">Antiguedad de licencia:</label>
            <input type="date" name="antig_licencia" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
