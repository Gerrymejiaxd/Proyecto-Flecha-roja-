<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\AsignacionConductoresController;
use App\Http\Controllers\ServicioMedicoController;

// Rutas de autenticación
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // Rutas de conductores
    Route::get('/conductores', [ConductorController::class, 'index'])->name('conductores.index');
    Route::get('/conductores/create', [ConductorController::class, 'create'])->name('conductores.create');
    Route::post('/conductores', [ConductorController::class, 'store'])->name('conductores.store');
    
    // Rutas de alta, baja y búsqueda
    Route::get('/conductores/alta', [ConductorController::class, 'alta'])->name('conductores.alta');
    Route::post('/conductores/alta', [ConductorController::class, 'guardar'])->name('conductores.guardar');
    Route::get('/conductores/baja', [ConductorController::class, 'baja'])->name('conductores.baja');
    Route::post('/conductores/baja/{id}', [ConductorController::class, 'darBaja'])->name('conductores.darBaja');
    Route::get('/conductores/buscar', [ConductorController::class, 'buscar'])->name('conductores.buscar');
    
    Route::get('/conductores/modificar/{id}', [ConductorController::class, 'modificar'])->name('conductores.modificar');
    Route::post('/conductores/modificar/{id}', [ConductorController::class, 'actualizar'])->name('conductores.actualizar');
    Route::get('/conductores/informes', [ConductorController::class, 'informes'])->name('conductores.informes');
    Route::post('/conductores/informes', [ConductorController::class, 'generarInforme'])->name('conductores.generarInforme');
    Route::get('/conductores/pdf/alta', [ConductorController::class, 'pdfAlta'])->name('conductores.pdf.alta');
    Route::get('/conductores/pdf/baja', [ConductorController::class, 'pdfBaja'])->name('conductores.pdf.baja');
    Route::get('/conductores/pdf/busqueda', [ConductorController::class, 'pdfBusqueda'])->name('conductores.pdf.busqueda');

    // Ruta de gestión de usuarios con middleware de rol
    Route::middleware(['checkRole:gestión de conductores'])->group(function () {
        Route::get('/conductores/manage-users', [ConductorController::class, 'manageUsers'])->name('conductores.manage_users');
        Route::post('/conductores/{user}/assign-role', [ConductorController::class, 'assignRole'])->name('conductores.assign_role');
    });

    // Rutas de informes
    Route::get('/informes', [InformeController::class, 'index'])->name('informes.index');
    Route::get('/informes/recursos_humanos', [InformeController::class, 'recursosHumanos'])->name('informes.recursos_humanos');
    Route::get('/informes/gestion_conductores', [InformeController::class, 'gestionConductores'])->name('informes.gestion_conductores');
    Route::post('/informes/generar', [InformeController::class, 'generar'])->name('informes.generar');

    // Rutas de asignación de conductores
    Route:: get('/asignacion-conductores', [AsignacionConductoresController::class, 'index'])->name('asignacion_conductores.index');
    Route::post('/asignacion-conductores/modificar/{id}', [AsignacionConductoresController::class, 'modificar'])->name('asignacion_conductores.modificar');

    // Rutas de servicio médico
    Route::get('/servicio-medico', [ServicioMedicoController::class, 'index'])->name('servicio_medico.index');
    Route::get('/servicio-medico/modificar/{id}', [ServicioMedicoController::class, 'modificar'])->name('servicio_medico.modificar');
    Route::post('/servicio-medico/actualizar/{id}', [ServicioMedicoController::class, 'actualizar'])->name('servicio_medico.actualizar');
});

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});




