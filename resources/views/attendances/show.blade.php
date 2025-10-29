@extends('master')
@section('title', 'Detail Presensi')
@section('content')

<div class="form-container">
    <h2 class="form-header-title">Detail Presensi {{ $attendance->employee->nama_lengkap }}</h2>

    <div class="form-grid-layout">
        <div class="form-group span-2">
            <label>Tanggal</label>
            <div class="detail-value">
                {{ \Carbon\Carbon::parse($attendance->tanggal)->isoFormat('dddd, D MMMM YYYY') }}
            </div>
        </div>
        <div class="form-group">
            <label>Waktu Masuk : </label>
            <div class="detail-value">
                {{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : 'Belum tercatat' }}
            </div>
        </div>
        <div class="form-group">
            <label>Waktu Keluar : </label>
            <div class="detail-value">
                {{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : 'Belum tercatat' }}
            </div>
        </div>
        <div class="form-group">
            <label>Status</label>
            <div class="detail-value">{{ ucfirst($attendance->status_absensi) }}</div>
        </div>

        <div class="form-group" style="justify-content: flex-end; margin-top: 0.5rem;">
                <div colspan="2" style="text-align: right;">
                    <a href="{{ route('attendances.index') }}" class="btn-secondary">Kembali</a>
                    <a href="{{ route('attendances.edit', $attendance->id) }}" type="submit" class="btn-primary">Edit</a>
                </div>
            </div>
    </div>
</div>

@endsection