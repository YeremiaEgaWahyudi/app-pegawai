@extends('master')
@section('title', 'Detail Departemen')
@section('content')

<div class="data-container">
    <h2 class="form-header-title">Detail Departemen {{$department->nama_departmen}}</h2>

    <h3 class="section-subtitle">Daftar di Departemen Ini ({{ $department->employees->count() }})</h3>
    @if($department->employees->count() > 0)
    <div class="data-scroll-container">
        <table class="data-table" style="min-width: 100px;">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($department->employees as $employee)
                <tr>
                    <td>{{ $employee->nama_lengkap }}</td>
                    <td>{{ $employee->position->nama_jabatan }}</td>
                    <td>{{ $employee->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="secton-subtitle" style="border-bottom: none;">Tidak ada karyawan di departemen ini.</p>
    @endif

    <div style="text-align: right; margin-top: 1.5rem; margin-bottom: 0.5rem;">
        <a href="{{ route('departments.index') }}" class="btn-secondary">Kembali</a>
    </div>

</div>
@endsection