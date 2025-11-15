@extends('master')
@section('title', 'Form Input Pegawai')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Form Pegawai</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-grid-layout">
            <div class="form-group span-2">
                <label for="nama_lengkap">Nama Lengkap :</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon :</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir :</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir">
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk :</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk">
            </div>

            <div class="form-group span-2">
                <label for="alamat">Alamat :</label>
                <textarea id="alamat" name="alamat" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="departemen_id">Departemen :</label>

                <select name="departemen_id" id="departemen_id">
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('departemen_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->nama_departmen }}
                    </option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="jabatan_id">Jabatan :</label>

                <select name="jabatan_id" id="jabatan_id">
                    @foreach($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->nama_jabatan }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="status">Status :</label>

                <select name="status" id="status">
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>

            </div>

            <div class="form-group" style="justify-content: flex-end;">
                <div style="text-align: right;">
                    <a href="{{ route('employees.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </div>
            </div>

        </div>
    </form>

</div>
@endsection