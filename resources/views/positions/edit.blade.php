@extends('master')
@section('title', 'Edit Jabatan')
@section('content')

<div class="form-container">
    
    <h2 class="form-header-title">Form Edit Jabatan {{ $position->nama_jabatan }}</h2>
    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid-layout">
            <div class="form-group">
                <label for="nama_jabatan">Jabatan : </label>
                <input type="text" id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan', $position->nama_jabatan) }}">
            </div>
            <div class="form-group">
                <label for="gaji_pokok">Gaji Pokok : </label>
                <input type="text" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok', $position->gaji_pokok) }}">
            </div>
            <div class="form-group span-2" style="justify-content: flex-end;">
                <div style="text-align: right;">
                    <a href="{{ route('positions.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection