@extends('master')
@section('title', 'Form Input Pegawai')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Form Pegawai</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <table class="form-layout-table">
            <tr>
                <td><label for="nama_lengkap">Nama Lengkap :</label></td>
                <td><input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"></td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td><input type="email" id="email" name="email"></td>
            </tr>
            <tr>
                <td><label for="nomor_telepon">Nomor Telepon :</label></td>
                <td><input type="text" id="nomor_telepon" name="nomor_telepon"></td>
            </tr>
            <tr>
                <td><label for="tanggal_lahir">Tanggal Lahir :</label></td>
                <td><input type="date" id="tanggal_lahir" name="tanggal_lahir"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat :</label></td>
                <td><textarea id="alamat" name="alamat" rows="4"></textarea></td>
            </tr>
            <tr>
                <td><label for="tanggal_masuk">Tanggal Masuk :</label></td>
                <td><input type="date" id="tanggal_masuk" name="tanggal_masuk"></td>
            </tr>
            <tr>
                <td><label for="departemen_id">Departemen :</label></td>
                <td>
                    <select name="departemen_id" id="departemen_id">
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ old('departemen_id') == $department->id ? 'selected' : '' }}>
                            {{ $department->nama_departmen }}
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="jabatan_id">Jabatan :</label></td>
                <td>
                    <select name="jabatan_id" id="jabatan_id">
                        @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->nama_jabatan }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="status">Status :</label></td>
                <td>
                    <select name="status" id="status">
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <a href="{{ route('employees.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </td>
            </tr>
        </table>
    </form>

</div>
@endsection