@extends('master')
@section('title', 'Detail Presensi')
@section('content')

<div class="form-container">
    <h2 class="form-header-title">Detail Presensi {{ $attendance->employee->nama_lengkap }}</h2>
    <table class="detail-table">
        <tr>
            <th>Tanggal</th>
            <td>{{ $attendance->tanggal }}</td>
        </tr>
        <tr>
            <th>Waktu Masuk</th>
            <td>{{ $attendance->waktu_masuk }}</td>
        </tr>
        <tr>
            <th>Waktu Keluar</th>
            <td>{{ $attendance->waktu_keluar }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                {{ $attendance->status_absensi }}
            </td>
        </tr>
    </table>

    <div style="text-align: right; margin-top: 1.5rem; margin-bottom: 0.5rem;">
        <a href="{{ route('attendances.index') }}" class="btn-secondary">Kembali</a>
    </div>
</div>

@endsection