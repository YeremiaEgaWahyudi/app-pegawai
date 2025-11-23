@extends('master')
@section('title', 'Daftar Presensi Karyawan')
@section('content')

<div class="data-container">
    <div class="header-data">
        <h2 class="title-data">Daftar Presensi</h2>
        <a href="{{ route('attendances.create') }}" class="tambah-data material-symbols-outlined"
            title="Tambah Presensi">add</a>
    </div>

    <div class="data-scroll-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Karyawan</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Status Absensi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $att)
                <tr>
                    <td>{{ $att->employee->nama_lengkap ?? 'N/A' }}</td>
                    <td>{{ $att->tanggal }}</td>
                    <td>{{ $att->waktu_masuk ?? '-' }}</td>
                    <td>{{ $att->waktu_keluar ?? '-' }}</td>
                    <td>{{ $att->status_absensi }}</td>
                    <td>
                        <div class="aksi-wrapper">
                            <a href="{{ route('attendances.show', $att->id) }}" title="Detail">
                                <span class="material-symbols-outlined">info</span>
                            </a>
                            <a href="{{ route('attendances.edit', $att->id) }}" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <form action="{{ route('attendances.destroy', $att->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus presensi {{ $att->employee->nama_lengkap }}?')"
                                    title="Hapus">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="empty-state">Tidak ada data presensi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($attendances->hasPages())
    <div class="pagination-links">
        {{ $attendances->links() }}
    </div>
    @endif
</div>
@endsection