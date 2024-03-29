<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PlatilloController;
use App\Http\Controllers\SucursalPlatilloController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleVentasController;
Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    // pagina principal del proyecto
    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Route::post('/dashboard/create', [DashboardController::class, 'realizarVenta'])->name('dashboard.create');
    // sucrusales
    Route::resource('sucursales', SucursalController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::post('/agregar-pedido', [DashboardController::class, 'agregarPedido'])->name('agregar.pedido');
    Route::post('/detalle-pedido', [DetalleVentasController::class, 'detallePedido'])->name('detalle.pedido');
    Route::post('/detalle-eliminar', [DetalleVentasController::class, 'destroy'])->name('detalle.destroy');
    Route::post('/actualventa', [DetalleVentasController::class, 'actualventa'])->name('detalle.actualventa');


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


    Route::post('/venta/realizar', [VentaController::class, 'realizarVenta'])->name('venta.realizar');


});

require __DIR__.'/auth.php';

