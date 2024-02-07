<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SucursalController;




Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::view('/dashboard','dashboard')->name('dashboard');

    Route::get('/sucursales',[SucursalController::class, 'index'])
    ->name('Sucursal.index');

    Route::post('/sucursales',[SucursalController::class, 'store'])
    ->name('Sucursal.store');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


 //Route::get('/sucursales/create', function(){
    //    return view('sucursales.create');
    //})->name('sucursales.create');
    /*
    $nombre = request('nombre');
        $domicilio = request('domicilio');
        $telefono = request('telefono');
        $email = request('email');
        $ciudad = request('ciudad');
        $estado = request('estado');
        $pais = request('pais');
    */
