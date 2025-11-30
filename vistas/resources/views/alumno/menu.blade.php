<!DOCTYPE html>
<Html>
    <body>

    <!-- ======================= HEADER SUPERIOR ======================= -->
    <header class="main-header">
        <div class="header-title">
            <h1>TECNM</h1>
        </div>

        <button class="menu-toggle-btn" onclick="openMenu()">
            <i class="fas fa-bars"></i>
        </button>

        <div class="header-logo">
            <img src="/img/logo.png" alt="Logo">
        </div>
    </header>

    <!-- ======================= OVERLAY OSCURO ======================= -->
    <div class="menu-overlay" id="menuOverlay" onclick="closeMenu()"></div>

    <!-- ======================= MENÚ LATERAL ======================= -->
    <nav class="sidebar-menu" id="sidebarMenu">

        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="/img/logo.png" alt="Logo">
            </div>

            <button class="close-menu-btn" onclick="closeMenu()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <ul class="sidebar-links">

            <li>
                <a href="{{ route('dashboard') }}"
                    class="{{ request()->is('dashboard') ? 'active-link' : '' }}">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </li>

            <li>
                <a href="{{ route('equipos') }}"
                    class="{{ request()->is('equipos*') ? 'active-link' : '' }}">
                    <i class="fas fa-users"></i> Equipos
                </a>
            </li>

            <li>
                <a href="{{ route('eventos') }}"
                    class="{{ request()->is('eventos*') ? 'active-link' : '' }}">
                    <i class="fas fa-calendar"></i> Eventos
                </a>
            </li>

            <li>
                <a href="{{ route('proyectos') }}"
                    class="{{ request()->is('proyectos*') ? 'active-link' : '' }}">
                    <i class="fas fa-lightbulb"></i> Proyectos
                </a>
            </li>

            <li>
                <a href="{{ route('constancias') }}"
                    class="{{ request()->is('constancias*') ? 'active-link' : '' }}">
                    <i class="fas fa-file-alt"></i> Constancias
                </a>
            </li>

        </ul>

        <a href="{{ route('login') }}" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </a>
    </nav>

    <!-- ======================= CONTENIDO ======================= -->
    <main>
        @yield('content')
    </main>

    <!-- ======================= SCRIPTS ======================= -->
    <script>
        function openMenu() {
            document.getElementById('sidebarMenu').classList.add('active');
            document.getElementById('menuOverlay').classList.add('active');
        }

        function closeMenu() {
            document.getElementById('sidebarMenu').classList.remove('active');
            document.getElementById('menuOverlay').classList.remove('active');
        }
    </script>

</body>
</Html>