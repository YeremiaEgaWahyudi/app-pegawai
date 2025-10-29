@extends('master')
@section('title', 'Daftar Absensi Karyawan')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Edit Presensi {{ $attendance->employee->nama_lengkap ?? 'Karyawan' }}</h2>
    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid-layout">
            <div class="form-group span-2">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', Carbon\Carbon::today()->toDateString()) }}">
            </div>

            <div class="form-group">
                <label for="waktu_masuk">Waktu Masuk : </label>
                <input type="time" name="waktu_masuk" id="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}">
            </div>
            <div class="form-group">
                <label for="waktu_keluar">Waktu Keluar : </label>
                <input type="time" name="waktu_keluar" id="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
            </div>

            <div class="form-group">
                <label for="status_absensi">Status : </label>
                    <select name="status_absensi" id="status_absensi">
                        <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
            </div>
            <input type="hidden" name="karyawan_id" value="{{ $attendance->karyawan_id }}">
            <div class="form-group" style="justify-content: flex-end;">
                <div colspan="2" style="text-align: right;">
                    <a href="{{ route('attendances.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection