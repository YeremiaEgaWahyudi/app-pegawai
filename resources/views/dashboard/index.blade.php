@extends('master')
@section('title', 'Dashboard')
@section('content')

<div class="dashboard-container">
    <!-- Header -->
    <div class="dashboard-header">
        <h1 class="dashboard-title">App Pegawai</h1>
        <p class="dashboard-subtitle">Selamat datang di sistem manajemen pegawai</p>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon employees">
                <span class="material-symbols-outlined">person</span>
            </div>
            <div class="stat-content">
                <h3 class="stat-label">Total Pegawai</h3>
                <p class="stat-value">{{ $totalEmployees }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon departments">
                <span class="material-symbols-outlined">domain</span>
            </div>
            <div class="stat-content">
                <h3 class="stat-label">Departemen</h3>
                <p class="stat-value">{{ $totalDepartments }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon positions">
                <span class="material-symbols-outlined">work</span>
            </div>
            <div class="stat-content">
                <h3 class="stat-label">Jabatan</h3>
                <p class="stat-value">{{ $totalPositions }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon attendance">
                <span class="material-symbols-outlined">event_note</span>
            </div>
            <div class="stat-content">
                <h3 class="stat-label">Hadir Hari Ini</h3>
                <p class="stat-value">{{ $presentToday }}</p>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="dashboard-grid">
        <!-- Recent Employees -->
        <div class="dashboard-card">
            <div class="card-header">
                <h2 class="card-title">Pegawai Terbaru</h2>
                <a href="{{ route('employees.index') }}" class="card-link">Lihat Semua</a>
            </div>
            <div class="card-body">
                @if($recentEmployees->count() > 0)
                <table class="mini-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Departemen</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentEmployees as $employee)
                        <tr>
                            <td>
                                <a href="{{ route('employees.show', $employee->id) }}">
                                    {{ $employee->nama_lengkap }}
                                </a>
                            </td>
                            <td>{{ $employee->department->nama_departmen ?? '-' }}</td>
                            <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="empty-state">Belum ada data pegawai</p>
                @endif
            </div>
        </div>

        <!-- Department Distribution -->
        <div class="dashboard-card">
            <div class="card-header">
                <h2 class="card-title">Distribusi Pegawai per Departemen</h2>
                <a href="{{ route('departments.index') }}" class="card-link">Lihat Semua</a>
            </div>
            <div class="card-body">
                @if($departmentStats->count() > 0)
                <div class="department-list">
                    @foreach($departmentStats as $dept)
                    @php
                    // Hitung persentase dan bulatkan ke 1 desimal
                    $percentage = $totalEmployees > 0
                    ? round(($dept->employees_count / $totalEmployees) * 100, 1)
                    : 0;
                    @endphp
                    <div class="dept-item">
                        <div class="dept-name">{{ $dept->nama_departmen }}</div>
                        <div class="dept-bar">
                            <div class="dept-progress" style="--progress-width: {{ $percentage }}%"></div>
                        </div>
                        <div class="dept-count">{{ $dept->employees_count }} pegawai</div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="empty-state">Belum ada data departemen</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Second Row -->
    <div class="dashboard-grid">
        <!-- Monthly Attendance -->
        <div class="dashboard-card">
            <div class="card-header">
                <h2 class="card-title">Absensi Bulan Ini</h2>
            </div>
            <div class="card-body">
                @if($monthlyAttendance->count() > 0)
                <div class="attendance-stats">
                    @foreach($monthlyAttendance as $stat)
                    <div class="attendance-item">
                        <div class="attendance-label">
                            <span class="status-badge status-{{ $stat->status_absensi }}">
                                @switch($stat->status_absensi)
                                @case('hadir')
                                Hadir
                                @break
                                @case('izin')
                                Izin
                                @break
                                @case('sakit')
                                Sakit
                                @break
                                @case('alpha')
                                Alpha
                                @break
                                @default
                                {{ $stat->status_absensi }}
                                @endswitch
                            </span>
                        </div>
                        <div class="attendance-count">{{ $stat->total }}</div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="empty-state">Belum ada data absensi bulan ini</p>
                @endif
            </div>
        </div>

        <!-- Latest Salaries -->
        <div class="dashboard-card">
            <div class="card-header">
                <h2 class="card-title">Gaji Terbaru</h2>
                <a href="{{ route('salaries.index') }}" class="card-link">Lihat Semua</a>
            </div>
            <div class="card-body">
                @if($latestSalaries->count() > 0)
                <table class="mini-table">
                    <thead>
                        <tr>
                            <th>Pegawai</th>
                            <th>Bulan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestSalaries as $salary)
                        <tr>
                            <td>
                                <a href="{{ route('employees.show', $salary->employee->id) }}">
                                    {{ $salary->employee->nama_lengkap ?? '-' }}
                                </a>
                            </td>
                            <td>{{ $salary->bulan }}</td>
                            <td>
                                <span class="salary-amount">
                                    Rp {{ number_format($salary->gaji_pokok + $salary->tunjangan - $salary->potongan, 0, ',', '.') }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="empty-state">Belum ada data gaji</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection