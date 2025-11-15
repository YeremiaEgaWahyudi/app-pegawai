@extends('master')
@section('title', 'Edit Presensi Karyawan')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Edit Presensi</h2>
        <p class="form-subtitle">Perbarui data presensi: {{ $attendance->employee->nama_lengkap ?? 'Karyawan' }}</p>
    </div>

    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="form-grid-layout">
            <fieldset class="form-section" style="grid-column: span 2;">
                <legend class="section-title">Data Presensi</legend>

                <input type="hidden" name="karyawan_id" value="{{ $attendance->karyawan_id }}">

                <div class="form-group">
                    <label for="tanggal">Tanggal <span class="required">*</span></label>
                    <input type="date" id="tanggal" name="tanggal"
                        value="{{ old('tanggal', $attendance->tanggal) }}"
                        required class="@error('tanggal') input-error @enderror">
                    @error('tanggal')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="waktu_masuk">Waktu Masuk</label>
                    <input type="time" id="waktu_masuk" name="waktu_masuk"
                        value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"
                        class="@error('waktu_masuk') input-error @enderror">
                    @error('waktu_masuk')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="waktu_keluar">Waktu Keluar</label>
                    <input type="time" id="waktu_keluar" name="waktu_keluar"
                        value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"
                        class="@error('waktu_keluar') input-error @enderror">
                    @error('waktu_keluar')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status_absensi">Status <span class="required">*</span></label>
                    <select id="status_absensi" name="status_absensi" required
                        class="@error('status_absensi') input-error @enderror">
                        <option value="">-- Pilih Status --</option>
                        <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
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
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection