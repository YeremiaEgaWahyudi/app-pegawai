@extends('master')
@section('title', 'Detail Jabatan')
@section('content')

<div class="form-container">
    <h2 class="form-header-title">Detail Jabatan {{ $position->nama_jabatan }}</h2>

    <div class="form-grid-layout">
            <div class="form-group">
                <label>Jabatan : </label>
                <div class="detail-value">{{ old('nama_jabatan', $position->nama_jabatan) }}</div>
            </div>
            <div class="form-group">
                <label>Gaji Pokok : </label>
                <div class="detail-value">{{ old('gaji_pokok', number_format($position->gaji_pokok, 0.,',', '.')) }}</div>
            </div>
            <div class="form-group span-2" style="justify-content: flex-end; margin-top: 0.5rem;">
                <div style="text-align: right;">
                    <a href="{{ route('positions.index') }}" class="btn-secondary">Kembali</a>
                    <a href="{{ route('positions.edit', $position->id) }}" class="btn-primary">Edit</a>
                </div>
            </div>
        </div>

</div>

@endsection