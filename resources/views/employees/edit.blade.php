@extends('master')
@section('title', 'Edit Pegawai')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Edit Data Pegawai {{ $employee->nama_lengkap }}</h2>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid-layout">
            <div class="form-group span-2">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email', $employee->email) }}">
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon :</label>
                <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir :</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}">
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk :</label>
                <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}">
            </div>

            <div class="form-group span-2">
                <label for="alamat">Alamat :</label>
                <textarea name="alamat" rows="4" value="{{ old('alamat', $employee->alamat) }}">{{ old('alamat', $employee->alamat) }}</textarea>
            </div>

            <div class="form-group">
                <label for="departemen_id">Departemen :</label>
                <select name="departemen_id">
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('departmen_id', $employee->departemen_id) == $department->id ? 'selected' : '' }}>
                        {{ $department->nama_departmen }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jabatan_id">Jabatan :</label>
                <select name="jabatan_id">
                    @foreach($positions as $position)
                    <option value="{{ $position->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $position->id ? 'selected' : '' }}>
                        {{ $position->nama_jabatan }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status :</label>
                <select name="status">
                    <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak aktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                </td>
            </div>
            <div class="form-group" style="justify-content: flex-end;">
                <div style="text-align: right;">
                    <a href="{{ route('employees.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection