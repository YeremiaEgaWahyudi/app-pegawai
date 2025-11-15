@extends('master')
@section('title', 'Tambah Jabatan')
@section('content')

<div class="form-container">
    
    <h2 class="form-header-title">Form Tambah Jabatan</h2>
    <form action="{{ route('positions.store') }}" method="POST">
        @csrf
        <div class="form-grid-layout">
            <div class="form-group">
                <label for="nama_jabatan">Jabatan : </label>
                <input type="text" name="nama_jabatan" id="nama_jabatan" value="{{ old('nama_jabatan') }}">
            </div>
            <div class="form-group">
                <label for="gaji_pokok">Gaji Pokok : </label>
                <input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok') }}">
            </div>
            <div class="form-group span-2" style="justify-content: flex-end;">
                <div style="text-align: right;">
                    <a href="{{ route('positions.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection