@extends('master')
@section('title', 'Detail Gaji')
@section('content')

<div class="form-container">
    <h2 class="form-header-title">Detail Gaji {{ $salary->employee->nama_lengkap ?? 'Karyawan' }}</h2>

    <div class="form-grid-layout">
        <div class="form-group span-2">
            <label for="karyawan_id">Karyawan : </label>
            <div class="detail-value">{{ $salary->employee->nama_lengkap }}</div>
        </div>

        <div class="form-group">
            <label for="bulan">Bulan : </label>
            <div class="detail-value">{{ $salary->bulan }}</div>
        </div>
        <div class="form-group">
            <label for="gaji_pokok">Gaji Pokok :</label>
            <div class="detail-value">{{ number_format($salary->gaji_pokok, 0, ',', '.') }}</div>
        </div>

        <div class="form-group">
            <label for="tunjangan">Tunjangan :</label>
            <div class="detail-value">{{ number_format($salary->tunjangan, 0, ',', '.') }}</div>
        </div>
        <div class="form-group">
            <label for="potongan">Potongan :</label>
            <div class="detail-value">{{ number_format($salary->potongan, 0, ',', '.') }}</div>
        </div>
        
        <div class="form-group">
            <label for="potongan">Total Gaji :</label>
            <div class="detail-value">{{ number_format($salary->total_gaji, 0, ',', '.') }}</div>
        </div>
        <div class="form-group" style="justify-content: flex-end;">
            <div style="text-align: right;">
                <a href="{{ route('salaries.index') }}" class="btn-secondary">Batal</a>
                <a href="{{ route('salaries.edit', $salary->id) }}" class="btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>

@endsection