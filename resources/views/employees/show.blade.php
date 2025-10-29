@extends('master')
@section('title', 'Detail Pegawai')
@section('content')

<div class="form-container">
    <h2 class="form-header-title">Detail Pegawai</h2>
    <div class="form-grid-layout">
            <div class="form-group span-2">
                <label for="nama_lengkap">Nama Lengkap</label>
                <div class="detail-value">{{ old('nama_lengkap', $employee->nama_lengkap) }}</div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <div class="detail-value">{{ old('email', $employee->email) }}</div>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon :</label>
                <div class="detail-value">{{ old('nomor_telepon', $employee->nomor_telepon) }}</div>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir :</label>
                <div class="detail-value">{{ old('tanggal_lahir', $employee->tanggal_lahir) }}</div>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk :</label>
                <div class="detail-value">{{ old('tanggal_masuk', $employee->tanggal_masuk) }}</div>
            </div>

            <div class="form-group span-2">
                <label for="alamat">Alamat :</label>
                <div class="detail-value">{{ old('alamat', $employee->alamat) }}</div>
            </div>

            <div class="form-group">
                <label for="departemen_id">Departemen :</label>
                <div class="detail-value">{{ $employee->department->nama_departmen }}</div>
            </div>
            <div class="form-group">
                <label for="jabatan_id">Jabatan :</label>
                <div class="detail-value">{{ $employee->position->nama_jabatan }}</div>
            </div>

            <div class="form-group">
                <label for="status">Status :</label>
                <div class="detail-value">{{ $employee->status }}</div>
            </div>
            <div class="form-group" style="justify-content: flex-end; ">
                <div style="text-align: right;">
                    <a href="{{ route('employees.index') }}" class="btn-secondary">Kembali</a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn-primary">Edit</a>
                </div>
            </div>
        </div>
</div>
@endsection