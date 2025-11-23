@extends('master')
@section('title', 'Detail Project: ' . $project->name)
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">{{ $project->name }}</h2>
        <p class="form-subtitle">Detail project dan tim anggota</p>
    </div>

    <div class="form-grid-layout">
        <!-- Informasi Project -->
        <fieldset class="form-section">
            <legend class="section-title">Informasi Project</legend>

            <div class="form-group">
                <label>Deskripsi</label>
                <div class="detail-value">{{ $project->description ?? '-' }}</div>
            </div>

            <div class="form-group">
                <label>Status</label>
                <div class="detail-value">
                    <span class="badge-{{ $project->status === 'completed' ? 'success' : ($project->status === 'in_progress' ? 'warning' : 'error') }}">
                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label>Tanggal Mulai</label>
                <div class="detail-value">{{ $project->start_date->format('d-m-Y') }}</div>
            </div>

            <div class="form-group">
                <label>Tanggal Selesai</label>
                <div class="detail-value">{{ $project->end_date?->format('d-m-Y') ?? '-' }}</div>
            </div>
        </fieldset>

        <!-- Tim & Quota -->
        <fieldset class="form-section">
            <legend class="section-title">Tim & Quota</legend>

            <div class="form-group">
                <label>Total Quota</label>
                <div class="detail-value">{{ $project->quota }} orang</div>
            </div>

            <div class="form-group">
                <label>Anggota Aktif</label>
                <div class="detail-value">{{ $project->active_count }} orang</div>
            </div>

            <div class="form-group">
                <label>Quota Tersisa</label>
                <div class="detail-value">
                    <span class="badge-{{ $project->remaining_quota > 0 ? 'success' : 'error' }}">
                        {{ $project->remaining_quota }} orang
                    </span>
                </div>
            </div>
        </fieldset>

        <!-- Daftar Anggota Tim -->
        <fieldset class="form-section span-2">
            <legend class="section-title">Anggota Tim</legend>

            @if($project->employees->count() > 0)
            <div style="overflow-x: auto;">
                <table class="data-table" style="margin-top: 1rem;">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Role</th>
                            <th>Bergabung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project->employees as $employee)
                        <tr>
                            <td>{{ $employee->nama_lengkap }}</td>
                            <td>{{ $employee->position->nama_posisi ?? '-' }}</td>
                            <td>{{ $employee->pivot->role ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($employee->pivot->joined_at)->format('d-m-Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="empty-state">Belum ada anggota tim</p>
            @endif
        </fieldset>
    </div>

    <div class="form-actions span-2">
        <a href="{{ route('projects.index') }}" class="btn-secondary">
            <span class="material-symbols-outlined">arrow_back</span>
            Kembali
        </a>
        <a href="{{ route('projects.edit', $project) }}" class="btn-primary">
            <span class="material-symbols-outlined">edit</span>
            Edit
        </a>
    </div>
</div>

@endsection