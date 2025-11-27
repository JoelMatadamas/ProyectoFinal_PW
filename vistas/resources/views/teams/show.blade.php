@extends('layouts.app')

@section('title', 'Detalles del Equipo')

@section('content')
<div class="detalle-equipo-container">


    <!-- Grid principal: 2 columnas arriba, 1 columna completa abajo -->
    <div class="detalle-main-grid">

        <!-- Columna Izquierda: Información del equipo -->
        <div class="col-left">
            <h2 class="section-subtitle">Detalles del Equipo :</h2>

            <div class="team-main-card neu-card">
                <div class="team-main-image">
                    <img src="{{ asset('images/imge2.jpg') }}" alt="Equipo">
                    <div class="team-main-name">Nombre del Equipo</div>
                </div>

                <div class="team-main-info">
                    <p><strong>Creación:</strong> 23 de Diciembre del 2023</p>
                    <div class="team-description-box">
                        Pequeña descripción del equipo
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna Derecha: Integrantes -->
        <div class="col-right">
            <h2 class="section-subtitle">Integrantes :</h2>

            <div class="integrantes-grid">
                @for($i = 1; $i <= 5; $i++)
                <div class="integrante-card neu-card">
                    <img src="{{ asset('images/logito.png') }}" alt="Integrante" class="avatar">
                    <div class="integrante-info">
                        <h4>Juanito Eduardo Quiroga Salvador</h4>
                        <p><strong>Rol :</strong> Rol en el equipo</p>
                        <p><strong>Carrera :</strong> Ing. en Sistemas</p>
                    </div>
                </div>
                @endfor
            </div>
        </div>

    </div>

    <!-- Sección de Solicitud: debajo de todo, ancho completo -->
    <div class="solicitud-full-section">
        <h2 class="section-subtitle">Solicitud del Equipo :</h2>

        <div class="solicitud-full-grid">
            <div class="solicitud-box neu-card">
                <h4>El equipo requiere :</h4>
                <p>Aquí debe de existir una descripción de que es lo que solicita el equipo</p>
            </div>

            <div class="unirse-box neu-card">
                <h4>Solicitar unirse :</h4>
                <select class="rol-select" required>
                    <option value="" disabled selected>Rol de Equipo</option>
                    <option value="lider">Líder de Proyecto</option>
                    <option value="desarrollador">Desarrollador Backend</option>
                    <option value="frontend">Desarrollador Frontend</option>
                    <option value="diseñador">Diseñador UI/UX</option>
                    <option value="tester">Tester / QA</option>
                    <option value="documentador">Documentador</option>
                </select>
                <button class="btn-unirse">UNIRSE</button>
            </div>
        </div>
    </div>

</div>
@endsection