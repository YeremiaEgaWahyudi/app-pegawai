@extends('master')
@section('title', 'Detail Pegawai')
@section('content')

<div class="form-container">
    <h2 class="form-header-title">Detail Pegawai</h2>
    <table class="detail-table">
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $employee->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $employee->email }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $employee->nomor_telepon }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $employee->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $employee->alamat }}</td>
        </tr>
        <tr>
            <th>Tanggal Masuk</th>
            <td>{{ $employee->tanggal_masuk }}</td>
        </tr>
        <tr>
            <th>Departemen</th>
            <td>{{ $employee->department->nama_departmen }}</td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td>{{ $employee->position->nama_jabatan }}</td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>Rp{{ number_format($employee->position->gaji_pokok, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $employee->status }}</td>
        </tr>
    </table>

    <div style="text-align: right; margin-top: 1.5rem; margin-bottom: 0.5rem;">
        <a href="{{ route('employees.index') }}" class="btn-secondary">Kembali</a>
    </div>
</div>
@endsection