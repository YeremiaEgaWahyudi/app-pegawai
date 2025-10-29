@extends('master')
@section('title', 'Catat Presensi Karyawan')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Form Catat Presensi</h2>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="form-grid-layout">
            <div class="form-group span-2">
                <label for="karyawan_id">Karyawan : </label>
                <select name="karyawan_id" id="karyawan_id">
                    @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ old('karyawan_id') == $employee->id ? 'selected' : ''}}
                        {{ $employee->nama_lengkap }}
                    </option>
                    @endforeach
                </select>
                </td>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal : </label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', Carbon\Carbon::today()->toDateString()) }}">
            </div>
            <div class="form-group">
                <label for="waktu_masuk">Waktu Masuk : </label>
                <input type="time" name="waktu_masuk" id="waktu_masuk" value="{{ old('waktu_masuk') }}">
            </div>

            <div class="form-group">
                <label for="status_absensi">Status : </label>
                <select name="status_absensi" id="status_absensi">
                    <option value="hadir" {{ old('status_absensi') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="izin" {{ old('status_absensi') == 'izin' ? 'selected' : '' }}>Izin</option>
                    <option value="sakit" {{ old('status_absensi') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="alpha" {{ old('status_absensi') == 'alpha' ? 'selected' : '' }}>Alpha</option>
                </select>
            </div>
            <div class="form-group" style="justify-content: flex-end;">
                <div style="text-align: right;">
                    <a href="{{ route('attendances.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection