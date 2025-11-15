@extends('master')
@section('title', 'Tambah Gaji Karyawan')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Tambah Data Gaji</h2>
        <p class="form-subtitle">Masukkan informasi gaji karyawan</p>
    </div>

    <form action="{{ route('salaries.store') }}" method="POST" novalidate>
        @csrf
        <div class="form-grid-layout">
            <fieldset class="form-section">
                <legend class="section-title">Informasi Gaji</legend>

                <div class="form-group">
                    <label for="karyawan_id">Karyawan <span class="required">*</span></label>
                    <select id="karyawan_id" name="karyawan_id" required
                        class="@error('karyawan_id') input-error @enderror">
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}"
                            {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->nama_lengkap }}
                            ({{ $employee->position->nama_jabatan ?? 'N/A' }} - {{ $employee->department->nama_departmen ?? 'N/A' }})
                        </option>
                        @endforeach
                    </select>
                    @error('karyawan_id')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bulan">Bulan <span class="required">*</span></label>
                    <input type="text" id="bulan" name="bulan"
                        value="{{ old('bulan') }}" placeholder="Contoh: Okt 2025" required
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
                        value="{{ old('gaji_pokok') }}" placeholder="0" required
                        class="@error('gaji_pokok') input-error @enderror">
                    @error('gaji_pokok')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tunjangan">Tunjangan</label>
                    <input type="number" id="tunjangan" name="tunjangan"
                        value="{{ old('tunjangan', 0) }}" placeholder="0"
                        class="@error('tunjangan') input-error @enderror">
                    @error('tunjangan')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="potongan">Potongan</label>
                    <input type="number" id="potongan" name="potongan"
                        value="{{ old('potongan', 0) }}" placeholder="0"
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
                    Simpan Gaji
                </button>
            </div>
        </div>
    </form>
</div>
@endsection