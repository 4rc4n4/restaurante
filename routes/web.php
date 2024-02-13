<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PlatilloController;
use App\Http\Controllers\SucursalPlatilloController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    // pagina principal del proyecto
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // sucrusales

    Route::resource('sucursales', SucursalController::class);

    //usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])
    ->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])
        ->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])
        ->name('usuarios.store');
    Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])
        ->name('usuarios.edit');
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])
        ->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])
        ->name('usuarios.destroy');

    //platillos
    Route::resource('platillos', PlatilloController::class);

    // Ruta para mostrar el formulario (método GET)
    Route::get('/sucursales/{sucursal}/asignar-platillo', [SucursalPlatilloController::class, 'showForm'])->name('sucursales.platillos.form');

    // Ruta para procesar el formulario (método POST)
    Route::post('/sucursales/{sucursal}/asignar-platillo', [SucursalPlatilloController::class, 'asignarPlatillo'])->name('sucursales.platillos.asignar');

    // ver los platillos de cada sucursal
    Route::get('/lista/ver-platillos', [SucursalController::class, 'verPlatillos'])->name('lista.ver.platillos');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('/ventas/realizar', [VentaController::class, 'realizarVenta'])->name('ventas.realizar')->middleware('auth', 'checkrole:mesero');

});

require __DIR__.'/auth.php';

