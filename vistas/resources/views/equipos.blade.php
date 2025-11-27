@extends('layouts.app')

@section('title', 'Equipos')

@section('content')
<div class="equipos-container">

    <h2 class="page-title">TU EQUIPO</h2>
    <div class="no-team-card neu-card">
        <p>Actualmente no perteneces a ningún equipo.</p>
    </div>

    <h2 class="section-title-large">EQUIPOS DISPONIBLES</h2>

    <!-- Contenedor con scroll horizontal -->
    <div class="teams-horizontal-scroll">
        <div class="teams-row">

            <!-- Equipo 1 -->
            <div class="team-card neu-card">
                <div class="team-image">
                    <img src="{{ asset('images/imge2.jpg') }}" alt="Equipo 1">
                    <div class="team-members-badge">
                        <i class="fas fa-users"></i> 4/6
                    </div>
                    <div class="team-color-bar" style="background: #2ecc71;"></div>
                </div>
                <div class="team-info">
                    <h3>Nombre de Equipo</h3>
                    <p class="team-desc">Descripción ...</p>
                    <a href="{{ route('teams.show') }}" class="btn-ver-mas">Ver más</a>
                </div>
            </div>

            <!-- Equipo 2 -->
            <div class="team-card neu-card">
                <div class="team-image">
                    <img src="{{ asset('images/imge2.jpeg') }}" alt="Equipo 2">
                    <div class="team-members-badge">
                        <i class="fas fa-users"></i> 2/6
                    </div>
                    <div class="team-color-bar" style="background: #e74c3c;"></div>
                </div>
                <div class="team-info">
                    <h3>Nombre de Equipo</h3>
                    <p class="team-desc">Descripción ...</p>
                    <a href="{{ route('teams.show') }}" class="btn-ver-mas">Ver más</a>
                </div>
            </div>

            <!-- Equipo 3 -->
            <div class="team-card neu-card">
                <div class="team-image">
                    <img src="{{ asset('images/imge3.jpg') }}" alt="Equipo 3">
                    <div class="team-members-badge">
                        <i class="fas fa-users"></i> 2/6
                    </div>
                    <div class="team-color-bar" style="background: #3498db;"></div>
                </div>
                <div class="team-info">
                    <h3>Nombre de Equipo</h3>
                    <p class="team-desc">Descripción ...</p>
                    <a href="{{ route('teams.show') }}" class="btn-ver-mas">Ver más</a>
                </div>
            </div>

            <!-- Puedes agregar más equipos aquí -->
        </div>
    </div>
</div>
@endsection