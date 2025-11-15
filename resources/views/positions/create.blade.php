@extends('master')
@section('title', 'Tambah Jabatan')
@section('content')

<div class="form-container">
    
    <h2 class="form-header-title">Form Tambah Jabatan</h2>
    <form action="{{ route('positions.store') }}" method="POST">
        @csrf
        <table class="form-layout-table">
            <tr>
                <td><label for="nama_jabatan">Jabatan : </label></td>
                <td><input type="text" name="nama_jabatan" id="nama_jabatan" value="{{ old('nama_jabatan') }}"></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok : </label></td>
                <td><input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok') }}"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <a href="{{ route('positions.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>

@endsection