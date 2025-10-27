@extends('master')
@section('title', 'Daftar Jabatan')
@section('content')

<div class="data-container">

    <div class="header-data">
        <h2 class="title-data">Daftar Jabatan</h2>
        <a href="{{ route('positions.create') }}" class="tambah-data">Tambah Jabatan</a>
    </div>

    <div class="data-scroll-container">
        <table class="data-table" style="min-width: 100px;">
            <thead>
                <tr>
                    <th>Nama Jabatan</th>
                    <th>Jumlah Pegawai</th>
                    <th>Gaji Pokok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($positions as $position)
                <tr>
                    <td>{{ $position->nama_jabatan }}</td>
                    <td>{{ $position->employees->count() }}</td>
                    <td>Rp{{ number_format($position->gaji_pokok, 0.,',', '.')}}</td>
                    <td>
                        <div class="aksi-wrapper">
                            <a href="{{ route('positions.show', $position->id)}}" title="Detail">
                                <span class="material-symbols-outlined">info</span>
                            </a>
                            <a href="{{ route('positions.edit', $position->id) }}" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus jabatan {{ $position->nama_jabatan }}?')"  title="Delete">
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
</div>

@endsection