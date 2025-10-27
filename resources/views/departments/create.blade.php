@extends('master')
@section('title', 'Tambah Departemen')
@section('content')

<div class="form-container">
    
    <h2 class="form-header-title">Form Tambah Departemen</h2>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <table class="form-layout-table">
            <tr>
                <td><label for="nama_departmen">Nama Departemen : </label></td>
                <td><input type="text" name="nama_departmen" id="nama_departmen" value="{{ old('nama_departmen') }}"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <a href="{{ route('departments.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>

@endsection