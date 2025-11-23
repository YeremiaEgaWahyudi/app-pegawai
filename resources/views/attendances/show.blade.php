@extends('master')
@section('title', 'Detail Presensi')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Detail Presensi</h2>
        <p class="form-subtitle">{{ $attendance->employee->nama_lengkap }} - {{ \Carbon\Carbon::parse($attendance->tanggal)->format('d-m-Y') }}</p>
    </div>

    <div class="form-grid-layout">
        <fieldset class="form-section" style="grid-column: span 2;">
            <legend class="section-title">Data Presensi</legend>

            <div class="form-group">
                <label>Karyawan</label>
                <div class="detail-value">{{ $attendance->employee->nama_lengkap }}</div>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <div class="detail-value">
                    {{ \Carbon\Carbon::parse($attendance->tanggal)->isoFormat('dddd, D MMMM YYYY') }}
                </div>
            </div>

            <div class="form-group">
                <label>Waktu Masuk</label>
                <div class="detail-value">
                    {{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '-' }}
                </div>
            </div>

            <div class="form-group">
                <label>Waktu Keluar</label>
                <div class="detail-value">
                    {{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '-' }}
                </div>
            </div>

            <div class="form-group">
                <label>Status</label>
                <div class="detail-value">
                    <span class="{{ $attendance->status_absensi == 'hadir' ? 'badge-success' : ($attendance->status_absensi == 'sakit' ? 'badge-warning' : 'badge-error') }}">
                        {{ ucfirst($attendance->status_absensi) }}
                    </span>
                </div>
            </div>
        </fieldset>

        <div class="form-actions span-2" style="grid-column: span 2;">
            <a href="{{ route('attendances.index') }}" class="btn-secondary">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali
            </a>
            <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn-primary">
                <span class="material-symbols-outlined">edit</span>
                Edit
            </a>
        </div>
    </div>
</div>
@endsection