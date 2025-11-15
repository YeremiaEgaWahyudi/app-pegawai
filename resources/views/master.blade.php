<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body class="app-body">

    <!-- Mobile header with hamburger menu -->
    <header class="mobile-header">
        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle sidebar">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <h1 class="mobile-title">@yield('page-title', 'App Pegawai')</h1>
    </header>

    <!-- Sidebar navigation -->
    <aside class="app-sidebar" id="sidebar">
        <div class="sidebar-header">
            <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <h1 class="sidebar-title">@yield('page-title', 'App Pegawai')</h1>
        </div>

        <nav class="sidebar-nav" aria-label="Main navigation">
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="sidebar-link {{ Request::is('/') || Request::is('dashboard*') ? 'active' : '' }}" @if(Request::is('/') || Request::is('dashboard*')) aria-current="page" @endif>
                        <span class="sidebar-icon material-symbols-outlined">dashboard</span>
                        <span class="sidebar-label">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/employees') }}" class="sidebar-link {{ Request::is('employees*') ? 'active' : '' }}" @if(Request::is('employees*')) aria-current="page" @endif>
                        <span class="sidebar-icon material-symbols-outlined">person</span>
                        <span class="sidebar-label">Employee</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/departments') }}" class="sidebar-link {{ Request::is('departments*') ? 'active' : '' }}" @if(Request::is('departments*')) aria-current="page" @endif>
                        <span class="sidebar-icon material-symbols-outlined">domain</span>
                        <span class="sidebar-label">Department</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/positions') }}" class="sidebar-link {{ Request::is('positions*') ? 'active' : '' }}" @if(Request::is('positions*')) aria-current="page" @endif>
                        <span class="sidebar-icon material-symbols-outlined">work</span>
                        <span class="sidebar-label">Position</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/attendances') }}" class="sidebar-link {{ Request::is('attendances*') ? 'active' : '' }}" @if(Request::is('attendances*')) aria-current="page" @endif>
                        <span class="sidebar-icon material-symbols-outlined">event_note</span>
                        <span class="sidebar-label">Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/salaries') }}" class="sidebar-link {{ Request::is('salaries*') ? 'active' : '' }}" @if(Request::is('salaries*')) aria-current="page" @endif>
                        <span class="sidebar-icon material-symbols-outlined">paid</span>
                        <span class="sidebar-label">Salary</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="sidebar-profile">
            <a href="{{ url('/profile') }}" class="profile-button" title="Profile">
                <span class="material-symbols-outlined">account_circle</span>
                <span class="profile-label">Profile</span>
            </a>
        </div>
    </aside>

    <!-- Main content area -->
    <main class="app-content">
        {{-- Global alert / flash messages --}}
        <div id="app-alerts" class="app-alerts" role="region" aria-live="polite">
            @if (session('success'))
            <div class="app-alert alert-success" role="alert">
                <button type="button" class="alert-close" aria-label="Close">&times;</button>
                <div class="alert-content">{!! session('success') !!}</div>
            </div>
            @endif

            @if (session('error'))
            <div class="app-alert alert-error" role="alert">
                <button type="button" class="alert-close" aria-label="Close">&times;</button>
                <div class="alert-content">{!! session('error') !!}</div>
            </div>
            @endif

            @if ($errors->any())
            <div class="app-alert alert-error" role="alert">
                <button type="button" class="alert-close" aria-label="Close">&times;</button>
                <div class="alert-content">
                    <strong>Terdapat beberapa kesalahan:</strong>
                    <ul>
                        @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="app-footer">
        <p>&copy; {{ date('Y') }} App Pegawai</p>
    </footer>

    <script>
        (function() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');
            const mobileToggle = document.getElementById('mobileToggle');
            const appBody = document.querySelector('.app-body');
            const appFooter = document.querySelector('.app-footer');

            const isMobile = () => window.innerWidth <= 768;

            // Restore previous state (desktop only)
            if (!isMobile()) {
                const collapsed = localStorage.getItem('sidebarCollapsed') === 'true';
                if (collapsed) {
                    sidebar.classList.add('collapsed');
                    appBody.classList.add('sidebar-collapsed');
                    if (appFooter) appFooter.classList.add('sidebar-collapsed');
                }
            }

            const handleToggle = function(e) {
                if (e) e.preventDefault();

                if (isMobile()) {
                    sidebar.classList.toggle('open');
                } else {
                    const isCollapsed = sidebar.classList.toggle('collapsed');
                    appBody.classList.toggle('sidebar-collapsed');
                    if (appFooter) appFooter.classList.toggle('sidebar-collapsed');
                    localStorage.setItem('sidebarCollapsed', isCollapsed);
                }
            };

            // Toggle buttons
            toggleBtn && toggleBtn.addEventListener('click', handleToggle);
            mobileToggle && mobileToggle.addEventListener('click', handleToggle);

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (isMobile() && sidebar.classList.contains('open')) {
                    if (!sidebar.contains(e.target) && !toggleBtn?.contains(e.target) &&
                        !mobileToggle?.contains(e.target)) {
                        sidebar.classList.remove('open');
                    }
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (isMobile()) {
                    sidebar.classList.remove('collapsed');
                    appBody.classList.remove('sidebar-collapsed');
                    if (appFooter) appFooter.classList.remove('sidebar-collapsed');
                } else {
                    sidebar.classList.remove('open');
                }
            });
        })();

        // Alert auto-close logic
        (function() {
            const alerts = document.querySelectorAll('.app-alert');
            if (!alerts || alerts.length === 0) return;

            alerts.forEach(function(alertEl) {
                const timeout = setTimeout(function() {
                    alertEl.style.transition = 'opacity 0.25s, transform 0.25s';
                    alertEl.style.opacity = '0';
                    alertEl.style.transform = 'translateY(-6px)';
                    setTimeout(function() {
                        alertEl.remove();
                    }, 300);
                }, 6000);

                const closeBtn = alertEl.querySelector('.alert-close');
                if (closeBtn) {
                    closeBtn.addEventListener('click', function() {
                        clearTimeout(timeout);
                        alertEl.remove();
                    });
                }
            });
        })();
    </script>
</body>

</html>