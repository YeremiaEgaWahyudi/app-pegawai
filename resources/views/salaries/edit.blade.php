@extends('master')
@section('title', 'Edit Gaji')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Edit Data Gaji</h2>
        <p class="form-subtitle">Perbarui informasi gaji: {{ $salary->employee->nama_lengkap ?? 'Karyawan' }}</p>
    </div>

    <form action="{{ route('salaries.update', $salary->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="form-grid-layout">
            <fieldset class="form-section">
                <legend class="section-title">Informasi Gaji</legend>

                <input type="hidden" name="karyawan_id" value="{{ $salary->employee->id }}">

                <div class="form-group">
                    <label for="karyawan_display">Karyawan</label>
                    <input type="text" id="karyawan_display" disabled
                        value="{{ $salary->employee->nama_lengkap }} ({{ $salary->employee->position->nama_jabatan ?? 'N/A' }} - {{ $salary->employee->department->nama_departmen ?? 'N/A' }})"
                        class="form-container input[type=text]">
                </div>

                <div class="form-group">
                    <label for="bulan">Bulan <span class="required">*</span></label>
                    <input type="text" id="bulan" name="bulan"
                        value="{{ old('bulan', $salary->bulan) }}" placeholder="Contoh: Okt 2025" required
                        class="@error('bulan') input-error @enderror">
                    @error('bulan')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>

            <fieldset class="form-section">
                <legend class="section-title">Komponen Gaji</legend>

                <div class="form-group">
                    <label for="gaji_pokok">Gaji Pokok <span class="required">*</span></label>
                    <input type="number" id="gaji_pokok" name="gaji_pokok"
                        value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" required
                        class="@error('gaji_pokok') input-error @enderror">
                    @error('gaji_pokok')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tunjangan">Tunjangan</label>
                    <input type="number" id="tunjangan" name="tunjangan"
                        value="{{ old('tunjangan', $salary->tunjangan) }}"
                        class="@error('tunjangan') input-error @enderror">
                    @error('tunjangan')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="potongan">Potongan</label>
                    <input type="number" id="potongan" name="potongan"
                        value="{{ old('potongan', $salary->potongan) }}"
                        class="@error('potongan') input-error @enderror">
                    @error('potongan')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>

            <div class="form-actions span-2" style="grid-column: span 2;">
                <a href="{{ route('salaries.index') }}" class="btn-secondary">
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