@extends('layouts.app')
@section('title', 'Mis Proyectos')
@section('content')
<div class="mis-proyectos-container">

    <!-- PROYECTO ACTUAL -->
    <h2 class="proyecto-section-title">PROYECTO ACTUAL</h2>

    <div class="proyecto-actual-grid">

        <!-- Columna izquierda: Tiempo + Subir avances (uno debajo del otro) -->
        <div class="proyecto-col-izquierda">
            <div class="proyecto-card-tiempo neu-card">
                <h4>Tiempo restante</h4>
                <p class="proyecto-tiempo-destacado">01 d : 23 hrs : 35 min</p>
            </div>

            <div class="proyecto-card-subir neu-card">
                <h4>Subir avances</h4>
                <button class="btn-proyecto-subir">SUBIR</button>
            </div>
        </div>

       <!-- CENTRO: Card principal grande horizontal (nombre + gráfica) -->
       <div class="proyecto-card-principal neu-card">

    <h3 class="proyecto-nombre">Nombre del proyecto</h3> <!-- AHORA ARRIBA DEL TODO -->

    <div class="proyecto-principal-izq">
        <div class="proyecto-info-line">Nombre del Equipo</div>
        <div class="proyecto-info-line">Nombre del Evento</div>
        <div class="proyecto-info-line">Rol en el Equipo</div>
    </div>

    <div class="proyecto-principal-der">
        <div class="proyecto-circulo-avance">
            <svg class="proyecto-progress-ring" width="200" height="200">
                <circle class="proyecto-progress-bg" stroke="#eee" stroke-width="16" fill="transparent" r="92" cx="100" cy="100"/>
                <circle class="proyecto-progress-bar" stroke="#eb8f3e" stroke-width="16" fill="transparent"
                        r="92" cx="100" cy="100" stroke-dasharray="578" stroke-dashoffset="289"/>
            </svg>

            <div class="proyecto-avance-texto">
                <span class="proyecto-porcentaje">50</span>
                <span class="proyecto-label-avance">Avance</span>
            </div>
        </div>
    </div>

</div>


        <!-- Derecha: Objetivos -->
        <div class="proyecto-card-objetivos neu-card">
            <h4>Objetivos a Cumplir</h4>
            <ul class="proyecto-lista-objetivos">
                <li class="proyecto-objetivo-cumplido"><i class="fas fa-check"></i> xxxxxxxxxxxx</li>
                <li class="proyecto-objetivo-cumplido"><i class="fas fa-check"></i> xxxxxxxxxxxx</li>
                <li class="proyecto-objetivo-pendiente"><i class="far fa-circle"></i> xxxxxxxxxxxx</li>
                <li class="proyecto-objetivo-pendiente"><i class="far fa-circle"></i> xxxxxxxxxxxx</li>
            </ul>
        </div>

    </div>

    <!-- HISTORIAL DE PROYECTOS -->
    <h2 class="proyecto-section-title">HISTORIAL DE PROYECTOS</h2>

    <div class="proyecto-historial-scroll">
        <div class="proyecto-historial-row">

            <!-- Proyecto histórico 1 -->
            <div class="proyecto-card-historial neu-card">
                <div class="proyecto-historial-header">
                    <h3 class="proyecto-historial-nombre">Nombre del proyecto</h3>
                    <button class="btn-proyecto-revisar">REVISAR</button>
                </div>
                <div class="proyecto-historial-info">
                    <p><strong>Evento:</strong> Nombre del Evento</p>
                    <p><strong>Fecha:</strong> 24 de Abril del 2025</p>
                </div>
                <div class="proyecto-historial-descripcion">
                    Aquí debe de existir una descripción del proyecto
                </div>
            </div>

            <!-- Proyecto histórico 2 -->
            <div class="proyecto-card-historial neu-card">
                <div class="proyecto-historial-header">
                    <h3 class="proyecto-historial-nombre">Nombre del proyecto</h3>
                    <button class="btn-proyecto-revisar">REVISAR</button>
                </div>
                <div class="proyecto-historial-info">
                    <p><strong>Evento:</strong> Nombre del Evento</p>
                    <p><strong>Fecha:</strong> 24 de Abril del 2025</p>
                </div>
                <div class="proyecto-historial-descripcion">
                    Aquí debe de existir una descripción del proyecto
                </div>
            </div>

            <!-- Puedes agregar más aquí -->
        </div>
    </div>

</div>
@endsection