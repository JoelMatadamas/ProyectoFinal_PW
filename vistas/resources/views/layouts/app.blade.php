<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TECNM - @yield('title', 'Actividades')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --bg-color: #f7f2e9;
            --primary-orange: #e67e22;
            --dark-orange: #d35400;
            --menu-bg: #eb8f3e;
            --text-dark: #444;
            --text-light: #777;
            --shadow-light: #ffffff;
            --shadow-dark: #d1cdc7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Neuromorfismo */
        .neu-card {
            background: var(--bg-color);
            border-radius: 20px;
            box-shadow: 9px 9px 18px var(--shadow-dark),
                        -9px -9px 18px var(--shadow-light);
        }

        /* Header fijo */
        .main-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #DB8C57;
            padding: 5px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            z-index: 1001;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .header-title h1 {
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .menu-toggle-btn {
            background: #f8f8f8;
            border: none;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            font-size: 1.4rem;
            color: var(--dark-orange);
            cursor: pointer;
            box-shadow: inset 3px 3px 6px rgba(0,0,0,0.1);
        }

        .header-logo img {
            width: 70px;
        }

        /* Menú lateral flotante */
        .sidebar-menu {
            position: fixed;
            top: 0;
            left: -300px;
            width: 300px;
            height: 100vh;
            background: linear-gradient(to bottom, var(--menu-bg), var(--dark-orange));
            z-index: 1002;
            padding: 30px 20px;
            transition: left 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            box-shadow: 8px 0 20px rgba(0,0,0,0.25);
            display: flex;
            flex-direction: column;
        }

        .sidebar-menu.active {
            left: 0;
        }

        .menu-overlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 60px;
        }

        .sidebar-logo img {
            width: 80px;
        }

        .close-menu-btn {
            background: #f0f0f0;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            color: var(--dark-orange);
            font-size: 1.3rem;
            cursor: pointer;
            box-shadow: inset 2px 2px 5px rgba(0,0,0,0.1);
        }

        .sidebar-links {
            list-style: none;
            padding-left: 0;
        }

        .sidebar-links a {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            padding: 15px 18px;
            border-radius: 15px;
            margin-bottom: 10px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .sidebar-links a i {
            width: 30px;
            text-align: center;
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .sidebar-links a.active-link,
        .sidebar-links a:hover {
            background: rgba(255,255,255,0.15);
        }

        /* Color normal del enlace activo */
.sidebar-links .active-link {
    background-color: #d97a18; /* tu color */
}

/* Cuando cualquier enlace tiene hover,
   el activo pierde temporalmente su color */
.sidebar-links:hover .active-link {
    background-color: transparent;
}

/* Pero si haces hover EXACTAMENTE sobre el activo,
   debe volver a su color */
.sidebar-links .active-link:hover {
    background-color: #d97a18;
}

        .logout-btn {
            margin-top: auto;
            background: rgba(255,255,255,0.25);
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: bold;
            backdrop-filter: blur(5px);
        }

        .logout-btn i {
            margin-right: 10px;
        }

        /* Contenido principal */
        .dashboard-container {
            margin-top: 90px;
            padding: 30px;
            max-width: 1300px;
            margin-left: auto;
            margin-right: auto;
            display: grid;
            grid-template-columns: 1fr 1.8fr;
            gap: 35px;
        }

        .section-title {
            font-size: 1.1rem;
            color: var(--text-dark);
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* Tarjetas de eventos */
        .event-card-container {
            margin-bottom: 30px;
        }

        .event-card-header {
            background: linear-gradient(45deg, #E77F30, #DB8C57);
            color: white;
            padding: 15px 25px;
            border-radius: 20px 20px 0 0;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .event-card-body {
            height: 200px;
            padding: 25px;
            background: var(--bg-color);
            border-radius: 0 0 20px 20px;
            box-shadow: 9px 9px 18px var(--shadow-dark);
                       
        }

        .event-desc {
            font-weight: 500;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .event-date, .event-participants {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        /* Progreso del proyecto */
        .progress-main-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 35px;
            margin-bottom: 75px;
        }

        .progress-info-items {
            flex: 1;
        }

        .info-item {
            background:rgba(255, 255, 255, 0.94);
            padding: 14px 20px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 15px;
            color: #999;
            font-weight: 600;
            opacity:0.8;
            box-shadow: 0px 4px 4px rgba(27, 27, 27, 0.25);
        }

        .progress-circle-container {
            position: relative;
            width: 160px;
            height: 160px;
            margin-left: 40px;
        }

        .progress-ring {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: conic-gradient(var(--primary-orange) 0% 50%, #ddd 50% 100%);
            -webkit-mask: radial-gradient(transparent 60%, black 61%);
            mask: radial-gradient(transparent 60%, black 61%);
            box-shadow: 8px 8px 16px var(--shadow-dark),
                        -8px -8px 16px var(--shadow-light);
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .progress-text span {
            display: block;
            color: #999;
            font-size: 0.9rem;
        }

        .progress-text strong {
            font-size: 3rem;
            color: var(--primary-orange);
            font-weight: bold;
        }

        /* Grid de tarjetas pequeñas */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .small-card {
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 9px 9px 18px var(--shadow-dark),
                        -9px -9px 18px var(--shadow-light);
            cursor: pointer;
            margin-bottom: 30px;
            height: 90px
        }

        .card-icon-box {
            width: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
        }

        .icon-athena { background: #002b56; }
        .icon-events { background: #003366; }
        .icon-const { background: #4a148c; }
        .icon-projects { background: #8e44ad; }
        .icon-teams { background: #2980b9; }

        .card-content-box {
            padding: 20px;
            background: var(--bg-color);
            flex: 1;
        }

        .card-content-box h4 {
            font-size: 1rem;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .card-content-box p {
            font-size: 0.85rem;
            color: var(--text-light);
        }
        .small-card:hover {
    background-color: rgba(230, 126, 34, 0.15);
    cursor: pointer;
    transform: translateY(-5px);
    transition: all 0.3s ease;
    box-shadow: 12px 12px 24px var(--shadow-dark),
                -12px -12px 24px var(--shadow-light);
}

        @media (max-width: 992px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }
            .progress-main-card {
                flex-direction: column;
                text-align: center;
            }
            .progress-circle-container {
                margin: 30px 0 0 0;
            }
        }






     

        /* ====================== VISTA EQUIPOS  ====================== */
.equipos-container {
    padding: 20px;
    display: block;
    grid-column: 1 / -1;
    width: 100%;
    margin: 0;
}

.page-title {
    font-size: 1.8rem;
    color: var(--text-dark);
    margin-bottom: 15px;
    font-weight: 600;
}

.section-title-large {
    font-size: 1.6rem;
    color: var(--text-dark);
    margin: 50px 0 30px 0;
    font-weight: 600;
}

.no-team-card {
    background: var(--bg-color);
    padding: 40px 30px;
    text-align: center;
    border-radius: 20px;
    box-shadow: 9px 9px 18px var(--shadow-dark), -9px -9px 18px var(--shadow-light);
    color: var(--text-light);
    font-size: 1.1rem;
    margin-bottom: 40px;
}

/* Scroll horizontal suave */
.teams-horizontal-scroll {
    overflow-x: auto;
    padding-bottom: 10px;
    scrollbar-width: thin;
    scrollbar-color: var(--primary-orange) transparent;
    height: 350vh;
}

.teams-horizontal-scroll::-webkit-scrollbar {
    height: 8px;
}

.teams-horizontal-scroll::-webkit-scrollbar-track {
    background: transparent;
}

.teams-horizontal-scroll::-webkit-scrollbar-thumb {
    background: var(--primary-orange);
    border-radius: 10px;
}

.teams-row {
    display: flex;

    width: 100%;
    gap: 50px;
    padding: 10px ;
}

/* Tarjeta de equipo */
.team-card {
    margin-top: 10px;
    width: 320px;
    flex-shrink: 0;
    border-radius: 28px;
    overflow: hidden;
    transition: all 0.3s ease;
    background: var(--bg-color);
    box-shadow: 9px 9px 18px var(--shadow-dark), -9px -9px 18px var(--shadow-light);
    margin-left:30px;
}

.team-card:hover {
    transform: translateY(-12px);
    box-shadow: 15px 15px 30px var(--shadow-dark), -15px -15px 30px var(--shadow-light);
}

.team-image {
    position: relative;
    height: 190px;
}

.team-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.team-members-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 9px 18px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.team-color-bar {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 70px;
    height: 12px;
    border-radius: 10px;
    background: currentColor;
}

.team-info {
    padding: 28px 20px;
    text-align: center;
    background: var(--bg-color);
}

.team-info h3 {
    font-size: 1.35rem;
    color: var(--text-dark);
    margin-bottom: 10px;
    font-weight: 600;
}

.team-desc {
    color: var(--text-light);
    font-size: 0.95rem;
    margin-bottom: 22px;
    line-height: 1.4;
}

.btn-ver-mas {
    display: inline-block;
    background: #eb8f3e;
    color: white;
    padding: 12px 35px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    box-shadow: 5px 5px 12px var(--shadow-dark), -5px -5px 12px var(--shadow-light);
}

.btn-ver-mas:hover {
    background: var(--dark-orange);
    transform: translateY(-3px);
}

/* Responsive */
@media (max-width: 768px) {
    .equipos-container {
        padding: 15px;
    }
    .team-card {
        width: 290px;
    }
}











/* ====================== DETALLES DEL EQUIPO ====================== */
.detalle-equipo-container {
    padding: 30px;
    max-width: 1300px;
    width: 100%;
    margin: 0 auto;
    display: block;
    grid-column: 1 / -1;
}

.page-title {
    font-size: 2.2rem;
    color: var(--text-dark);
    text-align: center;
    margin-bottom: 40px;
    font-weight: 700;
}

.detalle-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
}

.detalle-main-grid {
    display: flex;
    gap: 50px;
    margin-bottom: 60px;
}

/* Sección de solicitud debajo de ambas columnas */
.solicitud-full-section {
    margin-top: 30px;
}

.solicitud-full-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}

.section-subtitle {
    font-size: 1.5rem;
    color: var(--text-dark);
    margin-bottom: 20px;
    font-weight: 600;
}

.mt-50 { margin-top: 50px; }

/* Tarjeta principal del equipo */
.team-main-card {
    border-radius: 25px;
    overflow: hidden;
    margin-bottom: 30px;
    width: 90%;
    height: 90%;
}

.team-main-image {
    position: relative;
}

.team-main-image img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    border-radius: 25px 25px 0 0;
}

.team-main-name {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: var(--primary-orange);
    color: white;
    padding: 15px 25px;
    font-size: 1.4rem;
    font-weight: bold;
    text-align: center;
}

.team-main-info {
    padding: 25px;
    background: var(--bg-color);
}

.team-main-info p {
    margin-bottom: 15px;
    font-size: 1.05rem;
}

.team-description-box {
    background: white;
    padding: 20px;
    border-radius: 20px;
    font-size: 1rem;
    color: var(--text-light);
    /*box-shadow: inset 5px 5px 15px var(--shadow-dark), inset -5px -5px 15px var(--shadow-light);*/
}

/* Solicitud - Grid de 2 columnas */
.solicitud-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.solicitud-box, .unirse-box {
    padding: 25px;
    border-radius: 25px;
}

.solicitud-box h4, .unirse-box h4 {
    margin-bottom: 15px;
    font-size: 1.2rem;
    color: var(--text-dark);
}

.solicitud-box p {
    color: var(--text-light);
    line-height: 1.5;
}


/* Select y botón */
.rol-select {
    width: 100%;
    padding: 14px 18px;
    border: none;
    border-radius: 16px;
    background-color:white;
    font-size: 1rem;
    margin-bottom: 20px;
    /*box-shadow: inset 5px 5px 10px var(--shadow-dark), inset -5px -5px 10px var(--shadow-light);*/
    outline: none;
    cursor: pointer;
}

.btn-unirse {
    width: 100%;
    background: var(--primary-orange);
    color: white;
    border: none;
    padding: 16px;
    border-radius: 30px;
    font-size: 1.2rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 6px 6px 15px var(--shadow-dark), -6px -6px 15px var(--shadow-light);
}

.btn-unirse:hover {
    background: var(--dark-orange);
    transform: translateY(-3px);
}

/* Integrantes */
.integrantes-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
}

.integrante-card {
    display: flex;
    align-items: center;
    padding: 20px;
    border-radius: 25px;
    gap: 18px;
}

.integrante-card .avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #f0f0f0;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.integrante-info h4 {
    font-size: 1.05rem;
    margin-bottom: 8px;
    color: var(--text-dark);
}

.integrante-info p {
    font-size: 0.92rem;
    color: var(--text-light);
    margin: 4px 0;
}

.col-left{
    width: 40%;
}

/* Responsive */
@media (max-width: 992px) {
    .detalle-grid {
        grid-template-columns: 1fr;
    }
    .solicitud-grid {
        grid-template-columns: 1fr;
    }
    .integrantes-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 576px) {
    .integrante-card {
        flex-direction: column;
        text-align: center;
    }
    .avatar {
        width: 100px;
        height: 100px;
    }
}









/* ====================== EVENTOS ====================== */
.eventos-container {
    padding: 0px 0px;
    max-width: 1500px;
    margin: 0 auto;
}

.section-title-large {
    font-size: 1.9rem;
    color: #333;
    margin: 20px 0 35px 0;
    font-weight: 700;
    text-align: left;
}

/* Scroll horizontal */
.eventos-scroll {
    overflow-x: auto;
    padding: 35px 20px;
    margin-bottom: 50px;
    margin-rigth: 40px;
}
.eventos-scroll::-webkit-scrollbar { height: 8px; }
.eventos-scroll::-webkit-scrollbar-thumb {
    background: #eb8f3e;
    border-radius: 10px;
}

.eventos-row {
    display: flex;
    gap: 40px;
    min-width: max-content;
    padding: 0 10px;
}
.eventos-row.proximos { gap: 50px; }

/* Tarjeta base */
.evento-card {
    width: 360px;
    flex-shrink: 0;
    border-radius: 32px;
    overflow: hidden;
    background: #fdf8f5;
    box-shadow: 12px 12px 30px #d9d0c8, -12px -12px 30px #ffffff;
    transition: all 0.4s ease;
    cursor: pointer;
}
.evento-card:hover {
    transform: translateY(-15px);
    box-shadow: 18px 18px 50px #d0c7bf, -18px -18px 50px #ffffff;
}

/* Eventos en curso */
.evento-card.en-curso { 
    width: 360px; 
    margin-left: 23px;
}

/* Eventos próximos - más alargados */
.evento-card.proximo {
    width: 600px;
}

/* Imagen */
.evento-image {
    position: relative;
    height: 240px;
}
.evento-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Badge En curso (verde exacto) */
.badge-status.en-curso {
    position: absolute;
    top: 18px;
    left: 18px;
    background: #2ecc71;
    color: white;
    padding: 8px 22px;
    border-radius: 30px;
    font-weight: 700;
    font-size: 0.95rem;
    box-shadow: 0 5px 15px rgba(46, 204, 113, 0.5);
}

/* Badges próximos */
/* Badges de eventos próximos - esquina superior derecha */
.badge-status.proximo,
.badge-status.pronto {
    position: absolute;
    top: 18px;
    right: 18px;        /* ← CORREGIDO */
    left: auto !important;
    padding: 8px 22px;
    border-radius: 30px;
    font-weight: 700;
    font-size: 0.95rem;
    color: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.4);
    z-index: 10;
}

.badge-status.proximo { background: #3498db; }
.badge-status.pronto  { background: #e74c3c; }
/* Fecha glassmorphism - arriba izquierda */
.fecha-glass-top {
    position: absolute;
    top: 18px;
    left: 18px;
    background: rgba(255, 255, 255, 0.28);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.4);
    color:rgb(226, 125, 57);
    padding: 10px 18px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 10px;
    z-index: 10;
    box-shadow: 0 6px 20px rgba(0,0,0,0.25);
}

/* Tira naranja del título */
.evento-titulo-tira {
    background: #eb8f3e;
    padding: 16px 30px;
    text-align: center;
    margin-top: -5px;
}
.evento-titulo-tira h3 {
    color: white;
    font-size: 1.4rem;
    font-weight: 700;
    margin: 0;
}
.evento-titulo-tira.proximo {
    padding: 18px 30px;
}

/* Descripción solo en eventos en curso */
.evento-descripcion {
    padding: 25px 30px 30px;
    text-align: center;
}
.evento-descripcion p {
    color: #888;
    font-size: 1rem;
    line-height: 1.6;
    margin: 0;
}

/* Hace que toda la tarjeta sea clickeable y con efecto */
.evento-link {
    text-decoration: none;
    color: inherit;
    display: block;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.evento-link:hover .evento-card {
    transform: translateY(-12px);
    box-shadow: 20px 20px 50px rgba(0,0,0,0.15) !important;
}

.evento-link:hover .evento-titulo-tira h3 {
    color: #fff;
}

/* Opcional: efecto sutil de escala */
.evento-link:active .evento-card {
    transform: translateY(-8px) scale(0.98);
}

/* Responsive */
@media (max-width: 768px) {
    .evento-card { width: 320px !important; }
    .evento-card.proximo { width: 380px !important; }
    .section-title-large { text-align: center; font-size: 1.7rem; }
}







/* ====================== MIS PROYECTOS  ====================== */
.mis-proyectos-container {
    padding: 0px;
    max-width: 1500px;
    margin: 0 auto;
    display: block;
    grid-column: 1 / -1;
}

.proyecto-section-title {
    font-size: 2rem;
    color: #333;
    margin: 20px 0 40px 0;
    font-weight: 700;
}

/* GRID PRINCIPAL */
.proyecto-actual-grid {
    display: grid;
    grid-template-columns: 360px 1fr 320px;
    gap: 45px;
    margin-bottom: 100px;
    align-items: start;
}

.proyecto-col-izquierda {
    display: flex;
    flex-direction: column;
    gap: 35px;
}

/* CARD PRINCIPAL GRANDE (horizontal) */
.proyecto-card-principal {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 50px 60px;
    border-radius: 40px;
    box-shadow: 18px 18px 40px #e0d8d0, -18px -18px 40px #ffffff;
    height: 100%;
}

.proyecto-principal-izq {
    flex: 1;
}

.proyecto-nombre {
    font-size: 2.8rem;
    font-weight: 900;
    color: #333;
    margin: 0 0 30px 0;
    line-height: 1.1;
}

.proyecto-info-line {
    background:rgba(255, 255, 255, 0.94);
    padding: 16px 28px;
    border-radius: 26px;
    margin: 18px 0;
    font-size: 1.15rem;
    color: #A4AEB7;
    opacity:0.8;
    box-shadow: 0px 4px 4px rgba(27, 27, 27, 0.25);
}

.proyecto-principal-der {
    margin-left: 40px;
}

/* Gráfica más grande dentro del card principal */
.proyecto-circulo-avance {
    width: 200px;
    height: 200px;
    position: relative;
}
.proyecto-progress-bar { stroke-width: 16; }
.proyecto-porcentaje {
    font-size: 3.8rem;
    font-weight:81;
    color: #eb8f3e;
}
.proyecto-label-avance {
    font-size: 1.1rem;
    color:rgb(241, 220, 204);
    letter-spacing: 2px;
}

/* Cards izquierda */
.proyecto-card-tiempo,
.proyecto-card-subir {
    padding: 35px;
    border-radius: 36px;
    text-align: center;
}
.proyecto-tiempo-destacado {
    font-size: 1.4rem;
    font-weight: 900;
    color: #A4AEB7;
    margin-top: 35px;
}

/* Botón subir */
.btn-proyecto-subir {
    margin-top:15px;
    width: 100%;
    background: linear-gradient(145deg, #f39c12, #e67e22);
    color: white;
    border: none;
    padding: 18px;
    border-radius: 32px;
    font-size: 1.4rem;
    font-weight: 800;
    cursor: pointer;
    box-shadow: 8px 8px 20px #d3540050;
}
.btn-proyecto-subir:hover { background: #d35400; transform: translateY(-4px); }

/* Objetivos: rectángulo vertical alargado */
.proyecto-card-objetivos {
    padding: 40px 30px;
    border-radius: 36px;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.proyecto-card-objetivos h4 {
    font-size: 1.4rem;
    margin-bottom: 30px;
    text-align: center;
    font-weight: 700;
}
.proyecto-lista-objetivos {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    gap: 20px;
}
.proyecto-lista-objetivos li {
    font-size: 1.1rem;
    padding: 10px 0;
    display: flex;
    align-items: center;
    gap: 15px;
}
.proyecto-objetivo-cumplido { color: #27ae60; }
.proyecto-objetivo-pendiente { color: #ccc; }

/* HISTORIAL EN FILA HORIZONTAL */
.proyecto-historial-scroll {
    overflow-x: auto;
    padding: 20px 0;
    gap: 25px;
}
.proyecto-historial-scroll::-webkit-scrollbar { height: 10px; }
.proyecto-historial-scroll::-webkit-scrollbar-thumb { background: #eb8f3e; border-radius: 10px; }

.proyecto-historial-row {
    display: flex;
    gap: 40px;
    min-width: max-content;
    padding: 0 10px;
}

.proyecto-card-historial {
    width: 480px;
    flex-shrink: 0;
    padding: 35px;
    border-radius: 32px;
    margin-left:45px;
}

.proyecto-historial-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}
.proyecto-historial-nombre {
    font-size: 1.7rem;
    font-weight: 800;
    color: #333;
}

.btn-proyecto-revisar {
    background: #eb8f3e;
    color: white;
    border: none;
    padding: 12px 32px;
    border-radius: 30px;
    font-weight: bold;
    font-size: 1.1rem;
}
.btn-proyecto-revisar:hover { background: #d35400; }

.proyecto-circulo-avance {
    position: relative;     /* Permite posicionar el texto dentro */
    width: 200px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.proyecto-progress-ring {
    position: absolute;
    top: 0;
    left: 0;
}

.proyecto-avance-texto {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Lo centra */
    text-align: center;
    pointer-events: none; /* para que no interfiera */
}

.proyecto-porcentaje {
    font-size: 2.8rem;
    font-weight: bold;
    color: #eb8f3e;
    line-height: 1;
}

.proyecto-label-avance {
    display: block;
    font-size: 1rem;
    margin-top: 5px;
    color: #777;
}

.proyecto-principal-izq {
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Asegura que todo inicie arriba */
}

.proyecto-nombre {
    margin-bottom: 12px;        /* Separación natural */
    margin-top: 0;              /* Evita espacio extra arriba */
    font-size: 1.6rem;
    font-weight: bold;
}

.proyecto-card-principal {
    display: grid;
    grid-template-columns: 1fr 1fr; /* izquierda | derecha */
    gap: 20px;
    padding: 20px;
    position: relative;
}

.proyecto-nombre {
    grid-column: 1 / 3;      /* Hace que el título abarque toda la tarjeta */
    text-align: center;
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 20px;
    margin-top: 0;
}

.proyecto-principal-izq {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.proyecto-col-izquierda{
    height: 450px;
    justify-content: center; /* centra horizontalmente */
    align-items: center;     /* centra verticalmente */
}

.proyecto-card-tiempo{
    width: 90%;
    height:40%;
}

.proyecto-card-subir{
    width: 90%;
    height: 40%
}
/* Responsive */
@media (max-width: 1280px) {
    .proyecto-actual-grid { grid-template-columns: 340px 1fr 380px; gap: 30px; }
}
@media (max-width: 1024px) {
    .proyecto-actual-grid { grid-template-columns: 1fr; }
    .proyecto-col-izquierda, .proyecto-col-centro { align-items: center; }
}





/* ====================== VISTA CONSTANCIAS ====================== */
.constancias-container {
    padding: 60px 40px;
    max-width: 1000px;
    margin: 0 auto;
    min-height: 80vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    display: block;
    grid-column: 1 / -1;
}

.constancias-title {
    font-size: 2.8rem;
    font-weight: 800;
    color: #333;
    margin-bottom: 60px;
    text-align: center;
}

/* Card principal grande */
.constancias-card {
    width: 100%;
    min-width: 850px;
    border-radius: 40px;
    overflow: hidden;
    box-shadow: 
        20px 20px 50px #e8e0d8,
        -20px -20px 50px #ffffff;
}

/* Header naranja */
.constancias-header {
    background: linear-gradient(135deg, #f39c12, #e67e22);
    padding: 22px 40px;
    padding: 22px 40px;
    text-align: center;
}

.constancias-header h2 {
    color: white;
    font-size: 1.8rem;
    font-weight: 700;
    margin: 0;
    letter-spacing: 0.5px;
}

/* Contenido blanco */
.constancias-content {
    background: white;
    padding: 50px 70px;
    border-radius: 0 0 40px 40px;
    box-shadow: inset 0 10px 20px rgba(0,0,0,0.05);
}

/* Sección Periodo */
.periodo-section {
    margin-bottom: 40px;
}

.periodo-label {
    display: block;
    font-size: 1.4rem;
    font-weight: 600;
    color: #444;
    margin-bottom: 18px;
    text-align: left;
}

.select-wrapper {
    position: relative;
    width: 100%;
    max-width: 520px;
}

.periodo-select {
    width: 100%;
    padding: 20px 28px;
    font-size: 1.3rem;
    color: #888;
    border: none;
    border-radius: 28px;
    box-shadow: 
        inset 8px 8px 16px #f0e8e0,
        inset -8px -8px 16px #ffffff;
    appearance: none;
    cursor: pointer;
    outline: none;
    transition: all 0.3s ease;
}

.periodo-select:focus {
    box-shadow: 
        inset 8px 8px 16px #f0e8e0,
        inset -8px -8px 16px #ffffff,
        0 0 0 4px rgba(235, 143, 62, 0.2);
    color: #333;
}

/* Flecha personalizada del select */
.select-wrapper::after {
    content: '▼';
    position: absolute;
    top: 50%;
    right: 30px;
    transform: translateY(-50%);
    font-size: 1.8rem;
    color: #ccc;
    pointer-events: none;
}

/* Botón Buscar */
.buscar-section {
    text-align: right;
    margin-top: 30px;
}

.btn-buscar {
    background: linear-gradient(145deg, #f39c12, #e67e22);
    color: white;
    border: none;
    padding: 18px 50px;
    border-radius: 40px;
    font-size: 1.5rem;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 10px 10px 25px rgba(235, 143, 62, 0.4);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 12px;
}

.btn-buscar:hover {
    background: linear-gradient(145deg, #e67e22, #d35400);
    transform: translateY(-5px);
    box-shadow: 15px 15px 35px rgba(235, 143, 62, 0.5);
}

.btn-buscar i {
    font-size: 1.4rem;
}

/* Responsive */
@media (max-width: 768px) {
    .constancias-container { padding: 40px 20px; }
    .constancias-title { font-size: 2.3rem; margin-bottom: 40px; }
    .constancias-content { padding: 40px 30px; }
    .periodo-select { font-size: 1.2rem; padding: 18px 24px; }
    .btn-buscar { padding: 16px 40px; font-size: 1.4rem; }
    .select-wrapper::after { right: 20px; }
}
@media (max-width: 480px) {
    .buscar-section { text-align: center; margin-top: 40px; }
}





/* ====================== DETALLE DE EVENTO ====================== */
.evento-detalle-container {
    padding: 50px 40px;
    max-width: 1300px;
    margin: 0 auto;
    background: linear-gradient(to bottom, #fdf8f5, #f5ece4);
    min-height: 100vh;
    display: block;
    grid-column: 1 / -1;
}

.evento-hero {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    margin-bottom: 70px;
    align-items: start;
}

/* Tarjeta con logo del evento */
.evento-imagen-card {
    border-radius: 40px;
    padding: 40px;
    text-align: center;
    position: relative;
    background: white;
    box-shadow: 18px 18px 40px #e0d8d0, -18px -18px 40px #ffffff;
}

.evento-logo {
    max-width: 100%;
    height: auto;
    border-radius: 20px;
}

.evento-badge {
    position: absolute;
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
    background: #eb8f3e;
    color: white;
    padding: 14px 50px;
    border-radius: 30px;
    font-size: 1.4rem;
    font-weight: 700;
    box-shadow: 0 10px 25px rgba(235, 143, 62, 0.4);
}

/* Descripción */
.evento-descripcion-card {
    border-radius: 35px;
    padding: 40px;
    background: white;
    box-shadow: 18px 18px 40px #e0d8d0, -18px -18px 40px #ffffff;
    height: 335px;
}

.evento-descripcion-card h3 {
    font-size: 1.8rem;
    margin: 0 0 25px 0;
    color: #333;
    font-weight: 700;
}

.evento-titulo-evento {
    background: #eb8f3e;
    color: white;
    padding: 16px 30px;
    border-radius: 30px;
    font-size: 1.5rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 25px;
}

.evento-descripcion-texto {
    background: #fdf8f5;
    padding: 30px;
    border-radius: 28px;
    font-size: 1.2rem;
    color: #777;
    line-height: 1.7;
    box-shadow: 0px 4px 4px rgba(27, 27, 27, 0.25); 
    height: 45%;
}

/* Grid inferior */
.evento-inferior-grid {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 60px;
    margin-bottom: 80px;
}

/* Bases */
.evento-bases {
    border-radius: 35px;
    padding: 40px;
    background: white;
    box-shadow: 18px 18px 40px #e0d8d0, -18px -18px 40px #ffffff;
}

.evento-bases h3 {
    font-size: 1.8rem;
    margin: 0 0 25px 0;
    color: #333;
    font-weight: 700;
}

.bases-titulo {
    font-weight: 600;
    margin-bottom: 15px;
    color: #555;
}

.bases-contenido {
    background: #fdf8f5;
    padding: 30px;
    border-radius: 28px;
    font-size: 1.2rem;
    color: #777;
    line-height: 1.7;
    min-height: 180px;
    box-shadow: 0px 4px 4px rgba(27, 27, 27, 0.25); 
}

/* Solicitar unirse */
.evento-unirse {
    border-radius: 35px;
    padding: 40px;
    background: white;
    text-align: center;
    box-shadow: 18px 18px 40px #e0d8d0, -18px -18px 40px #ffffff;
}

.evento-unirse h3 {
    font-size: 1.8rem;
    margin: 0 0 30px 0;
    color: #333;
    font-weight: 700;
}

.unirse-select-wrapper {
    position: relative;
    margin-bottom: 35px;
}

.unirse-select {
    width: 100%;
    padding: 20px 28px;
    font-size: 1.3rem;
    background: #fdf8f5;
    border: none;
    border-radius: 28px;
    color: #888;
    box-shadow: 0px 4px 4px rgba(27, 27, 27, 0.25); 
    cursor: pointer;
    appearance: none;
}

.unirse-select:focus {
    outline: none;
    box-shadow: 0 0 0 4px rgba(235, 143, 62, 0.3);
    color: #333;
}

.unirse-select-wrapper::after {
    content: '▼';
    position: absolute;
    top: 50%;
    right: 30px;
    transform: translateY(-50%);
    font-size: 1.8rem;
    color: #ccc;
    pointer-events: none;
}

.btn-unirse {
    width: 100%;
    background: #eb8f3e;
    color: white;
    border: none;
    padding: 20px;
    border-radius: 35px;
    font-size: 1.6rem;
    font-weight: 900;
    cursor: pointer;
    box-shadow: 10px 10px 30px rgba(235, 143, 62, 0.5);
    transition: all 0.3s;
}

.btn-unirse:hover {
    background: #d35400;
    transform: translateY(-5px);
}

/* Footer: Fecha + Próximo */
.evento-footer {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40px;
    margin-top: 50px;
}

.fecha-badge {
    background: #fdf0e0;
    color: #e67e22;
    padding: 16px 40px;
    border-radius: 40px;
    font-size: 1.4rem;
    font-weight: 700;
    box-shadow: 8px 8px 20px #f0e9e0, -8px -8px 20px #ffffff;
    display: flex;
    align-items: center;
    gap: 12px;
}

.fecha-badge i {
    font-size: 1.6rem;
}

.btn-proximo {
    background: #00d4ff;
    color: white;
    border: none;
    padding: 18px 50px;
    border-radius: 40px;
    font-size: 1.5rem;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 10px 10px 30px rgba(0, 212, 255, 0.4);
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s;
}

.btn-proximo:hover {
    background: #00b4db;
    transform: translateY(-5px);
}

/* Responsive */
@media (max-width: 992px) {
    .evento-hero, .evento-inferior-grid {
        grid-template-columns: 1fr;
        gap: 50px;
    }
    .evento-footer {
        flex-direction: column;
    }
}

    </style>
</head>
<body>

    <div class="menu-overlay" id="menuOverlay"></div>

    <!-- Menú lateral -->
    <nav class="sidebar-menu" id="sidebarMenu">
        <div class="sidebar-header">
            <div class="sidebar-logo">
            <img src="{{ asset('images/logito.png') }}" alt="Logo ITO">
            </div>
            <button class="close-menu-btn" id="closeMenuBtn">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <ul class="sidebar-links">
            <li><a href="{{ route('dashboard') }}" class="active-link"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="{{ route('alumnoequipos') }}"><i class="fas fa-users"></i> Equipo</a></li>
            <li><a href="{{ route('alumnoeventos') }}"><i class="far fa-calendar-alt"></i> Eventos</a></li>
            <li><a href="{{ route('alumnoproyectos') }}"><i class="fas fa-flask"></i> Proyectos</a></li>
            <li><a href="{{ route('alumnoconstancias') }}"><i class="fas fa-file-alt"></i> Constancias</a></li>
        </ul>

        <a href="{{ route('login') }}" class="logout-btn">
    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
</a>
    </nav>

    <!-- Header -->
    <header class="main-header">
        <button class="menu-toggle-btn" id="openMenuBtn"><i class="fas fa-bars"></i></button>
        <div class="header-title"><h1>TECNM - ACTIVIDADES</h1></div>
        <div class="header-logo">
        <img src="{{ asset('images/logito.png') }}" alt="Logo ITO">
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="dashboard-container">
        @yield('content')
    </main>

    <script>
        const openBtn = document.getElementById('openMenuBtn');
        const closeBtn = document.getElementById('closeMenuBtn');
        const sidebar = document.getElementById('sidebarMenu');
        const overlay = document.getElementById('menuOverlay');

        openBtn.addEventListener('click', () => {
            sidebar.classList.add('active');
            overlay.classList.add('active');
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>
</body>
</html>