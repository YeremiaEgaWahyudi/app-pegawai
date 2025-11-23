@extends('master')
@section('title', 'Tambah Departemen')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Tambah Departemen</h2>
        <p class="form-subtitle">Masukkan informasi departemen baru</p>
    </div>

    <form action="{{ route('departments.store') }}" method="POST" novalidate>
        @csrf
        <div class="form-grid-layout">
            <fieldset class="form-section" style="grid-column: span 2;">
                <legend class="section-title">Informasi Departemen</legend>

                <div class="form-group">
                    <label for="nama_departmen">Nama Departemen <span class="required">*</span></label>
                    <input type="text" id="nama_departmen" name="nama_departmen"
                        value="{{ old('nama_departmen') }}" placeholder="Masukkan nama departemen"
                        required class="@error('nama_departmen') input-error @enderror">
                    @error('nama_departmen')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>

            <div class="form-actions span-2" style="grid-column: span 2;">
                <a href="{{ route('departments.index') }}" class="btn-secondary">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Kembali
                </a>
                <button type="submit" class="btn-primary">
                    <span class="material-symbols-outlined">save</span>
                    Simpan Departemen
                </button>
            </div>
        </div>
    </form>
</div>
@endsection