<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Vista Principal (Inicio)
    public function index() {
        return view('alumno.dashboard');
    }
    
}