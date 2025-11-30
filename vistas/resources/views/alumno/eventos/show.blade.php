@extends('layouts.app')

@section('title', 'Detalles del Evento')

@section('content')
<div class="evento-detalle-container">

    <!-- Imagen principal + título del evento -->
    <div class="evento-hero">
        <div class="evento-imagen-card neu-card">
            <img src="{{ asset('images/innovaTecNM.jpg') }}" alt="Innova TecNM 2025" class="evento-logo">
            <div class="evento-badge">Ya está aquí!</div>
        </div>

        <div class="evento-descripcion-card neu-card">
            <h3>Descripción</h3>
            <div class="evento-titulo-evento">Innova TecNM - 2025</div>
            <div class="evento-descripcion-texto">
                Aquí debe de existir una descripción del evento
            </div>
        </div>
    </div>

    <!-- Sección Bases + Solicitar unirse -->
    <div class="evento-inferior-grid">

        <!-- Bases del evento -->
        <div class="evento-bases neu-card">
            <h3>Bases</h3>
            <div class="bases-titulo">Bases del evento:</div>
            <div class="bases-contenido">
                Objetivos del evento
            </div>
        </div>

        <!-- Solicitar unirse -->
        <div class="evento-unirse neu-card">
            <h3>Solicitar unirse :</h3>
            <div class="unirse-select-wrapper">
                <select class="unirse-select">
                    <option value="" disabled selected>Ver Equipo(s)</option>
                    <option>Equipo Alpha</option>
                    <option>Equipo Beta</option>
                    <option>Equipo Gamma</option>
                </select>
            </div>
            <button class="btn-unirse">UNIRSE</button>
        </div>
    </div>

    <!-- Fecha + Botón Próximo -->
    <div class="evento-footer">
        <div class="fecha-badge">
            24 de abril del 2025
        </div>
        <button class="btn-proximo">
            Próximo
        </button>
    </div>

</div>
@endsection