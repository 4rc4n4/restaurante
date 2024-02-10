<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PlatilloController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    // pagina principal del proyecto
    Route::view('/dashboard','dashboard')->name('dashboard');

    // sucrusales
    Route::get('/sucursales',[SucursalController::class, 'index'])
    ->name('Sucursal.index');
    Route::post('/sucursales',[SucursalController::class, 'store'])
    ->name('Sucursal.store');

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





    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


