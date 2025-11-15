@extends('master')
@section('title', 'Detail Departemen')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Detail Departemen</h2>
        <p class="form-subtitle">{{ $department->nama_departmen }}</p>
    </div>

    <div class="form-grid-layout">
        <fieldset class="form-section" style="grid-column: span 2;">
            <legend class="section-title">Informasi Departemen</legend>

            <div class="form-group">
                <label>Nama Departemen</label>
                <div class="detail-value">{{ $department->nama_departmen }}</div>
            </div>
        </fieldset>

        <div class="form-actions span-2" style="grid-column: span 2;">
            <a href="{{ route('departments.index') }}" class="btn-secondary">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali
            </a>
            <a href="{{ route('departments.edit', $department->id) }}" class="btn-primary">
                <span class="material-symbols-outlined">edit</span>
                Edit
            </a>
        </div>
    </div>
</div>
@endsection