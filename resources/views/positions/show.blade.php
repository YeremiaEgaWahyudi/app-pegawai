@extends('master')
@section('title', 'Detail Jabatan')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Detail Jabatan</h2>
        <p class="form-subtitle">{{ $position->nama_jabatan }}</p>
    </div>

    <div class="form-grid-layout">
        <fieldset class="form-section" style="grid-column: span 2;">
            <legend class="section-title">Informasi Jabatan</legend>

            <div class="form-group">
                <label>Nama Jabatan</label>
                <div class="detail-value">{{ $position->nama_jabatan }}</div>
            </div>

            <div class="form-group">
                <label>Gaji Pokok</label>
                <div class="detail-value">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</div>
            </div>
        </fieldset>

        <div class="form-actions span-2" style="grid-column: span 2;">
            <a href="{{ route('positions.index') }}" class="btn-secondary">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali
            </a>
            <a href="{{ route('positions.edit', $position->id) }}" class="btn-primary">
                <span class="material-symbols-outlined">edit</span>
                Edit
            </a>
        </div>
    </div>
</div>
@endsection