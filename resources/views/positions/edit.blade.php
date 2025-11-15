@extends('master')
@section('title', 'Edit Jabatan')
@section('content')

<div class="form-container">
    
    <h2 class="form-header-title">Form Edit Jabatan {{ $position->nama_jabatan }}</h2>
    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="form-layout-table">
            <tr>
                <td><label for="nama_jabatan">Jabatan : </label></td>
                <td><input type="text" id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan', $position->nama_jabatan) }}"></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok : </label></td>
                <td><input type="text" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok', $position->gaji_pokok) }}"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <a href="{{ route('positions.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Update</button>
                </td>
            </tr>
        </table>
    </form>
</div>

@endsection