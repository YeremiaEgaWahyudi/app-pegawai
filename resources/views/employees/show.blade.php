@extends('master')
@section('title', 'Detail Pegawai')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Detail Pegawai</h2>
        <p class="form-subtitle">Informasi lengkap pegawai: {{ $employee->nama_lengkap }}</p>
    </div>
    <div class="form-grid-layout">
        <!-- Informasi Personal -->
        <fieldset class="form-section">
            <legend class="section-title">Informasi Personal</legend>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <div class="detail-value">{{ $employee->nama_lengkap }}</div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <div class="detail-value">{{ $employee->email }}</div>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <div class="detail-value">{{ $employee->nomor_telepon }}</div>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="detail-value">{{ $employee->tanggal_lahir ? \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d-m-Y') : '-' }}</div>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <div class="detail-value">{{ $employee->alamat ?? '-' }}</div>
            </div>
        </fieldset>

        <!-- Informasi Pekerjaan -->
        <fieldset class="form-section">
            <legend class="section-title">Informasi Pekerjaan</legend>

            <div class="form-group">
                <label>Departemen</label>
                <div class="detail-value">{{ $employee->department->nama_departmen }}</div>
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <div class="detail-value">{{ $employee->position->nama_jabatan }}</div>
            </div>

            <div class="form-group">
                <label>Tanggal Masuk</label>
                <div class="detail-value">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d-m-Y') }}</div>
            </div>

            <div class="form-group">
                <label>Status</label>
                <div class="detail-value">
                    <span class="{{ $employee->status == 'aktif' ? 'badge-success' : 'badge-error' }}">
                        {{ ucfirst($employee->status) }}
                    </span>
                </div>
            </div>
        </fieldset>

        <div class="form-actions span-2" style="grid-column: span 2;">
            <a href="{{ route('employees.index') }}" class="btn-secondary">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali
            </a>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn-primary">
                <span class="material-symbols-outlined">edit</span>
                Edit
            </a>
        </div>
    </div>
</div>
@endsection