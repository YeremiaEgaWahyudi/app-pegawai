@extends('master')
@section('title', 'Daftar Project')
@section('content')


<div class="data-container">
    <div class="header-data">
        <h3 class="title-data">Project</h3>
        <a href="{{ route('projects.create') }}" class="tambah-data material-symbols-outlined" title="Tambah-Project">add</a>
    </div>

    <div class="data-scroll-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 30%;">Nama Project</th>
                    <th style="width: 15%;">Status</th>
                    <th style="width: 15%;">Tim (Quota)</th>
                    <th style="width: 15%;">Tanggal</th>
                    <th style="width: 25%; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td><strong>{{ $project->name }}</strong></td>
                    <td>
                        <span class="badge-{{ $project->status === 'completed' ? 'success' : ($project->status === 'in_progress' ? 'warning' : 'error') }}">
                            {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                        </span>
                    </td>
                    <td>{{ $project->active_count }} / {{ $project->quota }}</td>
                    <td>{{ $project->start_date->format('d-m-Y') }}</td>
                    <td>
                        <div class="aksi-wrapper">
                            <a href="{{ route('projects.show', $project) }}" title="Detail" class="data-table-icon">
                                <span class="material-symbols-outlined">info</span>
                            </a>
                            <a href="{{ route('projects.edit', $project) }}" title="Edit" class="data-table-icon">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" title="Hapus" onclick="return confirm('Yakin?')" style="background:none;border:none;cursor:pointer;">
                                    <span class="material-symbols-outlined" style="color:#dc2626;">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-state">Tidak ada project</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($projects->hasPages())
    <div class="pagination-links">
        {{ $projects->links() }}
    </div>
    @endif
</div>


@endsection