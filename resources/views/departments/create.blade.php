@extends('master')
@section('title', 'Tambah Departemen')
@section('content')

<div class="form-container">
    
    <h2 class="form-header-title">Form Tambah Departemen</h2>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="form-grid-layout">
            <div class="form-group span-2">
                <label for="nama_departmen">Nama Departemen : </label>
                <input type="text" name="nama_departmen" id="nama_departmen" value="{{ old('nama_departmen') }}">
            </div>
            <div class="form-group span-2" style="justify-content: flex-end;">
                <div style="text-align: right;">
                    <a href="{{ route('departments.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection