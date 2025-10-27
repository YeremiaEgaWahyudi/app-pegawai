@extends('master')
@section('title', 'Daftar Absensi Karyawan')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Edit Presensi untuk {{ $attendance->employee->nama_lengkap ?? 'Karyawan' }}</h2>
    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="form-layout-table">
            <tr>
                <td><label for="tanggal">Tanggal</label></td>
                <td><input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d', strtotime($attendance->tanggal))) }}" readonly></td>
            </tr>
            <tr>
                <td><label for="waktu_masuk">Waktu Masuk : </label></td>
                <td><input type="time" name="waktu_masuk" id="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"></td>
            </tr>
            <tr>
                <td><label for="waktu_keluar">Waktu Keluar : </label></td>
                <td><input type="time" name="waktu_keluar" id="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"></td>
            </tr>
            <tr>
                <td><label for="status_absensi">Status : </label></td>
                <td>
                    <select name="status_absensi" id="status_absensi">
                        <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                </td>
            </tr>
            <input type="hidden" name="karyawan_id" value="{{ $attendance->karyawan_id }}">
            <tr>
                <td colspan="2" style="text-align: right;">
                    <a href="{{ route('attendances.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Update</button>
                </td>
            </tr>
        </table>
    </form>
</div>

@endsection