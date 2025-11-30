@extends('layouts.app')

@section('title', 'Constancias')

@section('content')
<div class="constancias-container">

    <!-- Título principal -->
    <h1 class="constancias-title">CONSTANCIAS</h1>

    <!-- Card grande con fondo naranja claro -->
    <div class="constancias-card neu-card">

        <!-- Header naranja -->
        <div class="constancias-header">
            <h2>Constancias disponibles</h2>
        </div>

        <!-- Contenido blanco -->
        <div class="constancias-content">

            <!-- Selector de periodo -->
            <div class="periodo-section">
                <label for="periodo" class="periodo-label">Periodo</label>
                
                <div class="select-wrapper">
                    <select id="periodo" class="periodo-select">
                        <option value="" disabled>Selecciona un periodo</option>
                        <option value="ene-jun-2025">Enero - Junio / 2025</option>
                        <option value="ago-dic-2025" selected>Agosto - Diciembre / 2025</option>
                        <option value="ene-jun-2026">Enero - Junio / 2026</option>
                        <option value="ago-dic-2026">Agosto - Diciembre / 2026</option>
                    </select>
                </div>
            </div>

            <!-- Botón Buscar -->
            <div class="buscar-section">
                <button class="btn-buscar">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>

        </div>
    </div>

    <!-- Aquí irán las constancias encontradas (en futuras vistas) -->
    <div class="constancias-resultados" id="resultados">
        <!-- Las constancias aparecerán aquí dinámicamente -->
    </div>

</div>
@endsection