@extends('master')
@section('title', 'Daftar Gaji Karyawan')
@section('content')

<div class="data-container">
    <div class="header-data">
        <h2 class="title-data">Daftar Gaji Karyawan</h2>
        <a href="{{ route('salaries.create') }}" class="tambah-data material-symbols-outlined"
            title="Tambah Gaji">add</a>
    </div>

    <div class="data-scroll-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Karyawan</th>
                    <th>Jabatan</th>
                    <th>Departemen</th>
                    <th>Bulan</th>
                    <th>Total Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($salaries as $salary)
                <tr>
                    <td>{{ $salary->employee->nama_lengkap ?? 'N/A' }}</td>
                    <td>{{ $salary->employee->position->nama_jabatan ?? 'N/A' }}</td>
                    <td>{{ $salary->employee->department->nama_departmen ?? 'N/A' }}</td>
                    <td>{{ $salary->bulan }}</td>
                    <td>Rp{{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                    <td>
                        <div class="aksi-wrapper">
                            <a href="{{ route('salaries.show', $salary->id) }}" title="Detail">
                                <span class="material-symbols-outlined">info</span>
                            </a>
                            <a href="{{ route('salaries.edit', $salary->id) }}" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus gaji {{ $salary->employee->nama_lengkap }}?')"
                                    title="Hapus">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="empty-state">Tidak ada data gaji</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-links">
        {{ $salaries->links() }}
    </div>
</div>
@endsection