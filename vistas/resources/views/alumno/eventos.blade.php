@extends('layouts.app')

@section('title', 'Eventos')

@section('content')
<div class="eventos-container">

    <h2 class="section-title-large">EVENTOS EXISTENTES</h2>

    <div class="eventos-scroll">
        <div class="eventos-row">

            <!-- Evento en curso -->
            <a href="{{ route('eventos.show') }}" class="evento-link">
            <div class="evento-card en-curso neu-card">
                <div class="evento-image">
                    <img src="{{ asset('images/innovaTecNM.jpg') }}" alt="Evento">
                    <span class="badge-status en-curso">En curso</span>
                </div>
                <div class="evento-titulo-tira">
                    <h3>Nombre del Evento</h3>
                </div>
                <div class="evento-descripcion">
                    <p>Pequeña descripción de el evento</p>
                </div>
            </div>
            </a>

            <!-- Repetir para más eventos en curso -->
            <a href="{{ route('eventos.show') }}" class="evento-link">
            <div class="evento-card en-curso neu-card">
                <div class="evento-image">
                    <img src="{{ asset('images/innovaTecNM.jpg') }}" alt="Evento">
                    <span class="badge-status en-curso">En curso</span>
                </div>
                <div class="evento-titulo-tira">
                    <h3>Nombre del Evento</h3>
                </div>
                <div class="evento-descripcion">
                    <p>Pequeña descripción de el evento</p>
                </div>
            </div>
            </a>

            <a href="{{ route('eventos.show') }}" class="evento-link">
            <div class="evento-card en-curso neu-card">
                <div class="evento-image">
                    <img src="{{ asset('images/innovaTecNM.jpg') }}" alt="Evento">
                    <span class="badge-status en-curso">En curso</span>
                </div>
                <div class="evento-titulo-tira">
                    <h3>Nombre del Evento</h3>
                </div>
                <div class="evento-descripcion">
                    <p>Pequeña descripción de el evento</p>
                </div>
            </div>
            </a>

        </div>
    </div>

    <h2 class="section-title-large">EVENTOS PRÓXIMOS</h2>

    <div class="eventos-scroll">
        <div class="eventos-row proximos">

            <!-- Evento Próximo -->
            <div class="evento-card proximo neu-card">
                <div class="evento-image proximo">
                    <div class="fecha-glass-top">
                        24 de Abril del 2026
                    </div>
                    <span class="badge-status proximo">Próximo</span>
                    <img src="{{ asset('images/tecnm.jpg') }}" alt="INFOVA 2025">
                </div>
                <div class="evento-titulo-tira proximo">
                    <h3>Nombre del Evento</h3>
                </div>
            </div>

            <!-- Evento Pronto -->
            <div class="evento-card proximo neu-card">
                <div class="evento-image proximo">
                    <div class="fecha-glass-top">
                        24 de Sep del 2026
                    </div>
                    <span class="badge-status pronto">Pronto</span>
                    <img src="{{ asset('images/tecnm.jpg') }}" alt="TECNM">
                </div>
                <div class="evento-titulo-tira proximo">
                    <h3>Nombre del Evento</h3>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection