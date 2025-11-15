@extends('master')
@section('title', 'Edit Pegawai')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Edit Data Pegawai {{ $employee->nama_lengkap }}</h2>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="form-layout-table">
            <tr>
                <td><label for="nama_lengkap">Nama Lengkap</label></td>
                <td><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" value="{{ old('email', $employee->email) }}"></td>
            </tr>
            <tr>
                <td><label for="nomor_telepon">Nomor Telepon :</label></td>
                <td><input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"></td>
            </tr>
            <tr>
                <td><label for="tanggal_lahir">Tanggal Lahir :</label></td>
                <td><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat :</label></td>
                <td><textarea name="alamat" rows="4" value="{{ old('alamat', $employee->alamat) }}">{{ old('alamat', $employee->alamat) }}</textarea></td>
            </tr>
            <tr>
                <td><label for="tanggal_masuk">Tanggal Masuk :</label></td>
                <td><input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"></td>
            </tr>
            <tr>
                <td><label for="departemen_id">Departemen :</label></td>
                <td>
                    <select name="departemen_id">
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('departmen_id', $employee->departemen_id) == $department->id ? 'selected' : '' }}>
                                {{ $department->nama_departmen }}
                            </option>
                        @endforeach
                    </select>
            </tr>
            <tr>
                <td><label for="jabatan_id">Jabatan :</label></td>
                <td>
                    <select name="jabatan_id">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $position->id ? 'selected' : '' }}>
                                {{ $position->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </td>
            <tr>
                <td><label for="status">Status :</label></td>
                <td>
                    <select name="status">
                        <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak aktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <a href="{{ route('employees.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Update</button>
                </td>
            </tr>
        </table>
    </form>
</div>

@endsection