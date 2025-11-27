<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;

class DashboardController extends Controller
{
    // Vista Principal (Inicio)
    public function index() {
        return view('dashboard');
    }

    // Vista de Equipos (Ejemplo de reutilización)
    public function equipo() {
        // Podrías retornar otra vista que extienda del mismo layout
        return view('equipo'); 
    }
}