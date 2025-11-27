<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Vista login
Route::get('/', function () {
    return view('welcome');
})->name('login');

// Procesa login
Route::post('/', function () {

    $num_control = request('num_control');
    $password = request('password');

    // Simulación para entrar
    if ($num_control === "12345" && $password === "admin") {
        return redirect()->route('dashboard');  // ← ESTA ES CORRECTA
    }

    return back()->with('error', 'Usuario o contraseña incorrectos');
})->name('login.process');


Route::prefix('portal')->group(function () {

    Route::get('/inicio', [DashboardController::class, 'index'])
        ->name('dashboard'); 

});

Route::get('/portal/equipo', function () {
    return view('equipos'); // o 'portal.equipo' si está en carpeta
})->name('equipos');

Route::get('/equipo/id', function () {
    return view('teams.show');
})->name('teams.show');

Route::get('/eventos', function () {
    return view('eventos');
})->name('eventos');

Route::get('/mis-proyectos', function () {
    return view('proyectos');
})->name('proyectos');

Route::get('/constancias', function () {
    return view('constancias');
})->name('constancias');