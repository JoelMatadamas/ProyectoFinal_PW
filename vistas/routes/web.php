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
        return redirect()->route('alumno.dashboard');  // ← ESTA ES CORRECTA
    }

    return back()->with('error', 'Usuario o contraseña incorrectos');
})->name('login.process');


Route::prefix('portal')->group(function () {

    Route::get('/inicio', [DashboardController::class, 'index'])
        ->name('dashboard'); 

});

Route::get('/portal/equipo', function () {
    return view('alumno.equipos'); 
})->name('alumnoequipos');

Route::get('/equipo/id', function () {
    return view('alumno.teams.show');
})->name('teams.show');

Route::get('/eventos', function () {
    return view('alumno.eventos');
})->name('alumnoeventos');

Route::get('/mis-proyectos', function () {
    return view('alumno.proyectos');
})->name('alumnoproyectos');

Route::get('/constancias', function () {
    return view('alumno.constancias');
})->name('alumnoconstancias');

Route::get('/eventos/id', function () {
    return view('alumno.eventos.show');
})->name('eventos.show');