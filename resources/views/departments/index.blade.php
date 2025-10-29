@extends('master')
@section('title', 'Daftar Departemen')
@section('content')

<div class="data-container">
    <div class="header-data">
        <h2 class="title-data">Daftar Departemen</h2>
        <a href="{{ route('departments.create') }}" class="tambah-data material-symbols-outlined">add</a>
    </div>

    <div class="data-scroll-container">
        <table class="data-table" style="min-width: 100px;">
            <thead>
                <tr>
                    <th>Nama Departemen</th>
                    <th>Jumlah Pegawai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->nama_departmen }}</td>
                    <td>{{ $department->employees->count() }}</td>
                    <td>
                        <div class="aksi-wrapper">
                            <a href="{{ route('departments.show', $department->id) }}" title="Detail">
                                <span class="material-symbols-outlined">info</span>
                            </a>
                            <a href="{{ route('departments.edit', $department->id) }}" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus departemen {{ $department->nama_departmen }}?')" title="Delete">
                                    <span class="material-symbols-outlined">delete</span>
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
        {{ $departments->links() }}
    </div>
</div>

@endsection