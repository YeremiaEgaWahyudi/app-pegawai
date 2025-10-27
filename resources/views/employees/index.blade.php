@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')

<div class="data-container">

    <div class="header-data">
        <h2 class="title-data">Daftar Pegawai</h2>
        <a href="{{ route('employees.create') }}" class="tambah-data">Tambah Pegawai</a>
    </div>

    <div class="data-scroll-container">
    <table class="data-table">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Tanggal Masuk</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->nama_lengkap }}</td>
                <td>{{ $employee->department->nama_departmen }}</td>
                <td>{{ $employee->position->nama_jabatan }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->nomor_telepon }}</td>
                <td>{{ $employee->tanggal_lahir }}</td>
                <td>{{ $employee->alamat }}</td>
                <td>{{ $employee->tanggal_masuk }}</td>
                <td>{{ $employee->status }}</td>
                <td>
                    <div class="aksi-wrapper">
                        <a href="{{  route('employees.show', $employee->id) }}" title="Detail">
                            <span class="material-symbols-outlined">info</span>
                        </a>
                        <a href="{{ route('employees.edit', $employee->id) }}" title="Edit">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus {{ $employee->nama_lengkap }} ?')" title="Delete">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <div class="pagination-links">
        {{ $employees->links() }}
    </div>

</div>
@endsection