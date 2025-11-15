@extends('master')
@section('title', 'Edit Jabatan')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Edit Jabatan</h2>
        <p class="form-subtitle">Perbarui informasi jabatan: {{ $position->nama_jabatan }}</p>
    </div>

    <form action="{{ route('positions.update', $position->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="form-grid-layout">
            <fieldset class="form-section" style="grid-column: span 2;">
                <legend class="section-title">Informasi Jabatan</legend>

                <div class="form-group">
                    <label for="nama_jabatan">Nama Jabatan <span class="required">*</span></label>
                    <input type="text" id="nama_jabatan" name="nama_jabatan"
                        value="{{ old('nama_jabatan', $position->nama_jabatan) }}"
                        placeholder="Masukkan nama jabatan" required
                        class="@error('nama_jabatan') input-error @enderror">
                    @error('nama_jabatan')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gaji_pokok">Gaji Pokok <span class="required">*</span></label>
                    <input type="number" id="gaji_pokok" name="gaji_pokok"
                        value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                        placeholder="Masukkan gaji pokok" required
                        class="@error('gaji_pokok') input-error @enderror">
                    @error('gaji_pokok')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>

            <div class="form-actions span-2" style="grid-column: span 2;">
                <a href="{{ route('positions.index') }}" class="btn-secondary">
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