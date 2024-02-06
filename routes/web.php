<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::view('/dashboard','dashboard')->name('dashboard');

    Route::get('/sucursales', function(){
        return view('sucursales.index');
    })->name('sucursales.index');
    
    //Route::get('/sucursales/create', function(){
    //    return view('sucursales.create');
    //})->name('sucursales.create');
    Route::post('/sucursales', function(){
        $nombre = request('nombre');
        $domicilio = request('domicilio');
        $telefono = request('telefono');
        $email = request('email');
        $ciudad = request('ciudad');
        $estado = request('estado');
        $pais = request('pais'); 
    })->name('sucursales.index');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
