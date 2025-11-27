@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <section class="left-col">
        <h3 class="section-title">Eventos actuales</h3>
        <div class="event-card-container neu-card">
            <div class="event-card-header">Nombre del evento</div>
            <div class="event-card-body">
                <p class="event-desc">Competencia de programación y diseño de 48 horas</p>
                <p class="event-date">15 de Marzo, 2024</p>
                <p class="event-participants">Participantes:</p>
            </div>
        </div>

        <h3 class="section-title">Eventos recientes</h3>
        <div class="event-card-container neu-card">
            <div class="event-card-header">Nombre del evento</div>
            <div class="event-card-body">
                <p class="event-desc">Competencia de programación y diseño de 48 horas</p>
                <p class="event-date">15 de Marzo, 2024</p>
                <p class="event-participants">Participantes:</p>
            </div>
        </div>
    </section>

    <section class="right-col">
        <h3 class="section-title">Progreso del proyecto actual</h3>
        
        <div class="progress-main-card neu-card">
            <div class="progress-info-items">
                <div class="info-item">Nombre del Equipo</div>
                <div class="info-item">Nombre del Evento</div>
                <div class="info-item">Rol en el Equipo</div>
            </div>
            <div class="progress-circle-container">
                <div class="progress-ring"></div>
                <div class="progress-text">
                    <span>Avance</span>
                    <strong>50</strong>
                </div>
            </div>
        </div>

        <div class="cards-grid">
            <div class="small-card neu-card">
                <div class="card-icon-box icon-athena"><i class="fas fa-brain"></i></div>
                <div class="card-content-box">
                    <h4>EVENTOS ACTIVOS</h4>
                    <p>Verifica los eventos en curso</p>
                </div>
            </div>

            <div class="small-card neu-card">
                <div class="card-icon-box icon-const"><i class="fas fa-certificate"></i></div>
                <div class="card-content-box">
                    <h4>CONSTANCIAS</h4>
                    <p>Genera tus constancias</p>
                </div>
            </div>

            <div class="small-card neu-card">
                <div class="card-icon-box icon-projects"><i class="fas fa-cogs"></i></div>
                <div class="card-content-box">
                    <h4>MIS PROYECTOS</h4>
                    <p>Verifica tus proyectos</p>
                </div>
            </div>

            <div class="small-card neu-card">
                <div class="card-icon-box icon-teams"><i class="fas fa-users"></i></div>
                <div class="card-content-box">
                    <h4>EQUIPOS</h4>
                    <p>Verifica los equipos disponibles</p>
                </div>
            </div>
        </div>
    </section>
@endsection