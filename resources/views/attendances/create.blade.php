@extends('master')
@section('title', 'Catat Presensi Karyawan')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Catat Presensi</h2>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <table class="form-layout-table">
            <tr>
                <td><label for="karyawan_id">Karyawan : </label></td>
                <td>
                    <select name="karyawan_id" id="karyawan_id">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ old('karyawan_id') == $employee->id ? 'selected' : ''}}
                            {{ $employee->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="tanggal">Tanggal : </label></td>
                <td><input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', Carbon\Carbon::today()->toDateString()) }}"></td>
            </tr>
            <tr>
                <td><label for="waktu_masuk">Waktu Masuk : </label></td>
                <td><input type="time" name="waktu_masuk" id="waktu_masuk" value="{{ old('waktu_masuk') }}"></td>
            </tr>
            <tr>
                <td><label for="status_absensi">Status : </label></td>
                <td>
                    <select name="status_absensi" id="status_absensi">
                        <option value="hadir" {{ old('status_absensi') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ old('status_absensi') == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ old('status_absensi') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ old('status_absensi') == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <a href="{{ route('attendances.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>

@endsection