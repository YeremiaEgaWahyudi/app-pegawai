@extends('master')
@section('title', 'Detail Jabatan')
@section('content')

<div class="data-container">
    <h2 class="form-header-title">Detail Jabatan {{ $position->nama_jabatan }}</h2>

    <h3 class="section-subtitle">Daftar di Jabatan Ini ({{ $position->employees->count() }})</h3>
    @if($position->employees->count() > 0)
    <div class="data-scroll-container">
    <table class="data-table" style="min-width: 100px;">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Departemen</th>
                <th>Email</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($position->employees as $employee)
            <tr>
                <td>{{ $employee->nama_lengkap }}</td>
                <td>{{ $employee->department->nama_departmen }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->tanggal_masuk }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="section-subtitle" style="border-bottom: none;">Tidak ada karyawan di jabatan ini.</p>
    @endif
    </div>

    <div style="text-align: right; margin-top: 1.5rem; margin-bottom: 0.5rem;">
        <a href="{{ route('positions.index') }}" class="btn-secondary">Kembali</a>
    </div>

</div>

@endsection