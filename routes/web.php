<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\AsignacionConductoresController;
use App\Http\Controllers\ServicioMedicoController;
use App\Http\Controllers\UserController;

// Ruta para la página de inicio de sesión
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Ruta para enviar los datos de inicio de sesión
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Grupo de rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // Ruta para la gestión de conductores
    Route::get('/conductores/gestion', [ConductorController::class,'gestion'])->name('conductores.gestion');
    
    // Otras rutas de conductores
    Route::get('/conductores', [ConductorController::class, 'index'])->name('conductores.index');
    Route::get('/conductores/create', [ConductorController::class, 'create'])->name('conductores.create');
    Route::post('/conductores', [ConductorController::class, 'store'])->name('conductores.store');
    Route::get('/conductores/alta', [ConductorController::class, 'alta'])->name('conductores.alta');
    Route::post('/conductores/alta', [ConductorController::class, 'guardar'])->name('conductores.guardar');
    Route::post('/conductores/baja', [ConductorController::class, 'baja'])->name('conductores.baja');
    Route::post('/conductores/darbaja/{id}', [ConductorController::class, 'darBaja'])->name('conductores.darBaja');
    Route::get('/conductores/búsqueda', [ConductorController::class, 'buscar'])->name('conductores.busqueda');
    Route::get('/conductores/búsqueda/{id}', [ConductorController::class, 'buscarporId'])->name('conductores.búsqueda.id');
    Route::get('/conductores/modificar/{id}', [ConductorController::class, 'modificar'])->name('conductores.modificar');
    Route::post('/conductores/actualizar/{id}', [ConductorController::class, 'actualizar'])->name('conductores.actualizar');
    
    // Rutas para informes
    Route::get('/informes', [InformeController::class, 'index'])->name('informes.index');
    Route::get('/conductores/informes', [InformeController::class, 'informes'])->name('conductores.informes');
    Route::post('/conductores/generar-informes', [InformeController::class, 'generar'])->name('conductores.generarInforme');
    Route::get('/conductores/pdf/recursos_humanos', [InformeController::class, 'recursosHumanos'])->name('conductores.pdf.recursos_humanos');
    Route::get('/conductores/pdf/gestion_conductores', [InformeController::class, 'gestionConductores'])->name('conductores.pdf.gestion_conductores');
    Route::post('/informes/generar', [InformeController::class, 'generar'])->name('informes.generar');
    Route::get('/informes/{id}', [InformeController::class, 'mostrarInforme'])->name('informes.mostrar'); // Ruta para mostrar un informe específico
    Route::get('/informes/pdf/{id}', [InformeController::class, 'generarPDF'])->name('informes.pdf'); // Ruta para generar PDF de un informe

    // Rutas para gestión de usuarios, protegida por autenticación y rol
    Route::get('/usuarios/gestionar', [UserController::class, 'manageUsers'])
        ->name('usuarios.gestionar')
        ->middleware('role:gestión conductores'); // Aquí se aplica el middleware de rol

    // Grupo de rutas para gestión de usuarios, protegido por autenticación y redirección
    Route::middleware(['redirect.to.gestion'])->group(function () {
        Route::get('/conductores/manage-users', [ConductorController::class, 'gestion.conductores'])->name('conductores.manage_users');
        Route::post('/conductores/{user}/assign-role', [ConductorController::class, 'assignRole'])->name('conductores.assign_role');
    });

    // Rutas para asignación de conductores
    Route::get('/asignacion-conductores', [AsignacionConductoresController::class, 'index'])->name('asignacion_conductores.index');
    Route::post('/asignacion-conductores/modificar/{id}', [AsignacionConductoresController::class, 'modificar'])->name('asignacion_conductores.modificar');

    // Rutas para servicio médico
    Route::get('/servicio-medico', [ServicioMedicoController::class, 'index'])->name ('servicio_medico.index');
    Route::get('/servicio-medico/modificar/{id}', [ServicioMedicoController::class, 'modificar'])->name('servicio_medico.modificar');
    Route::post('/servicio-medico/actualizar/{id}', [ServicioMedicoController::class, 'actualizar'])->name('servicio_medico.actualizar');
});

// Ruta para la página de inicio
Route::get('/', function () {
    return view('welcome');
});





