<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body class="app-body">

    <header class="app-header"> 
        <h1 class="header-title">
            @yield('page-title', 'App Pegawai')
        </h1>
        <nav class="nav-link">
            <ul class="flex space-x-4 list-none">
                <li><a href="{{ url('/employees') }}" class="nav-link">Employee</a></li>
                <li><a href="{{ url('/departments') }}" class="nav-link">Department</a></li>
                <li><a href="{{ url('/positions') }}" class="nav-link">Position</a></li>
                <li><a href="{{ url('/attendances') }}" class="nav-link">Attendance</a></li>
                <li><a href="{{ url('/salaries') }}" class="nav-link">Salary</a></li>
            </ul>
        </nav>
    </header>

    <main class="app-content">
        @yield('content')
    </main>

    <footer class="app-footer">
        <p>&copy; {{ date ('Y') }} App Pegawai</p>
    </footer>
</body>

</html>