@extends('master')
@section('title', 'Detail Gaji')
@section('content')

<div class="form-container">
    <h2 class="form-header-title">Detail Gaji {{ $salary->employee->nama_lengkap ?? 'Karyawan' }}</h2>

    <table class="detail-table">
        <tr>
            <th>Karyawan</th>
            <td>{{ $salary->employee->nama_lengkap ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Posisi</th>
            <td>{{ $salary->employee->position->nama_jabatan ?? 'N/A'}}</td>
        </tr>
        <tr>
            <th>Departemen</th>
            <td>{{ $salary->employee->department->nama_departmen }}</td>
        </tr>
        <tr>
            <th>Bulan</th>
            <td>{{ $salary->bulan }}</td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>Rp{{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Tunjangan</th>
            <td>Rp{{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Potongan</th>
            <td>Rp{{ number_format($salary->potongan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Gaji</th>
            <td>Rp{{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div style="text-align: right; margin-top: 1.5rem; margin-bottom: 0.5rem;">
        <a href="{{ route('salaries.index') }}" class="btn-secondary">Kembali</a>
    </div>
</div>

@endsection