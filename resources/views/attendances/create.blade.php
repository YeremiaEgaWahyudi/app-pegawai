@extends('master')
@section('title', 'Catat Presensi Karyawan')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Catat Presensi</h2>
        <p class="form-subtitle">Masukkan data presensi karyawan</p>
    </div>

    <form action="{{ route('attendances.store') }}" method="POST" novalidate>
        @csrf
        <div class="form-grid-layout">
            <fieldset class="form-section" style="grid-column: span 2;">
                <legend class="section-title">Data Presensi</legend>

                <div class="form-group">
                    <label for="karyawan_id">Karyawan <span class="required">*</span></label>
                    <select id="karyawan_id" name="karyawan_id" required
                        class="@error('karyawan_id') input-error @enderror">
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}"
                            {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->nama_lengkap }}
                        </option>
                        @endforeach
                    </select>
                    @error('karyawan_id')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal <span class="required">*</span></label>
                    <input type="date" id="tanggal" name="tanggal"
                        value="{{ old('tanggal', Carbon\Carbon::today()->toDateString()) }}"
                        required class="@error('tanggal') input-error @enderror">
                    @error('tanggal')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="waktu_masuk">Waktu Masuk</label>
                    <input type="time" id="waktu_masuk" name="waktu_masuk"
                        value="{{ old('waktu_masuk') }}"
                        class="@error('waktu_masuk') input-error @enderror">
                    @error('waktu_masuk')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status_absensi">Status <span class="required">*</span></label>
                    <select id="status_absensi" name="status_absensi" required
                        class="@error('status_absensi') input-error @enderror">
                        <option value="">-- Pilih Status --</option>
                        <option value="hadir" {{ old('status_absensi') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ old('status_absensi') == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ old('status_absensi') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ old('status_absensi') == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                    @error('status_absensi')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>

            <div class="form-actions span-2" style="grid-column: span 2;">
                <a href="{{ route('attendances.index') }}" class="btn-secondary">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Kembali
                </a>
                <button type="submit" class="btn-primary">
                    <span class="material-symbols-outlined">save</span>
                    Simpan Presensi
                </button>
            </div>
        </div>
    </form>
</div>
@endsection