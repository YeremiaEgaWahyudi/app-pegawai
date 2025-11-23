@extends('master')
{{-- Ganti Title menjadi Edit Project --}}
@section('title', 'Edit Project: ' . $project->name)
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Edit Project: {{ $project->name }}</h2>
        <p class="form-subtitle">Ubah informasi project dan kelola anggota tim</p>
    </div>

    {{-- FORM UTAMA UNTUK UPDATE INFORMASI PROJECT DAN QUOTA --}}
    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid-layout">
            <fieldset class="form-section">
                <legend class="section-title">Informasi Project</legend>

                {{-- TAMBAHAN: Nama Project (Asumsi Nama Project adalah field yang diedit) --}}
                <div class="form-group">
                    <label for="name">Nama Project</label>
                    <input type="text" id="name" name="name"
                        value="{{ old('name', $project->name) }}"
                        class="form-input @error('name') input-error @enderror" required>
                    @error('name') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                {{-- DESKRIPSI (TEXTAREA) --}}
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description"
                        class="form-input @error('description') input-error @enderror">{{ old('description', $project->description) }}</textarea>
                    @error('description') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                {{-- STATUS (SELECT) --}}
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-input @error('status') input-error @enderror" required>
                        @php $currentStatus = old('status', $project->status); @endphp
                        <option value="planning" {{ $currentStatus === 'planning' ? 'selected' : '' }}>Planning</option>
                        <option value="in_progress" {{ $currentStatus === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="on_hold" {{ $currentStatus === 'on_hold' ? 'selected' : '' }}>On Hold</option>
                        <option value="completed" {{ $currentStatus === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $currentStatus === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    @error('status') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                {{-- TANGGAL MULAI (INPUT DATE) --}}
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai</label>
                    <input type="date" id="start_date" name="start_date"
                        value="{{ old('start_date', $project->start_date?->format('Y-m-d')) }}"
                        class="form-input @error('start_date') input-error @enderror" required>
                    @error('start_date') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                {{-- TANGGAL SELESAI (INPUT DATE) --}}
                <div class="form-group">
                    <label for="end_date">Tanggal Selesai (Target)</label>
                    <input type="date" id="end_date" name="end_date"
                        value="{{ old('end_date', $project->end_date?->format('Y-m-d')) }}"
                        class="form-input @error('end_date') input-error @enderror">
                    @error('end_date') <span class="error-message">{{ $message }}</span> @enderror
                </div>
            </fieldset>

            <fieldset class="form-section">
                <legend class="section-title">Tim & Quota</legend>

                {{-- TOTAL QUOTA (INPUT NUMBER) --}}
                <div class="form-group">
                    <label for="quota">Total Quota</label>
                    <input type="number" id="quota" name="quota" value="{{ old('quota', $project->quota) }}"
                        class="form-input @error('quota') input-error @enderror" min="{{ $project->employees->count() }}" required>
                    @error('quota') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                {{-- Anggota Aktif (Detail, Read-only) --}}
                <div class="form-group">
                    <label>Anggota Aktif Saat Ini</label>
                    <div class="detail-value">{{ $project->active_count }} orang</div>
                </div>

                {{-- Quota Tersisa (Detail, Read-only) --}}
                <div class="form-group">
                    <label>Quota Tersisa</label>
                    <div class="detail-value">
                        <span class="badge-{{ $project->remaining_quota > 0 ? 'success' : 'error' }}">
                            {{ $project->remaining_quota }} orang
                        </span>
                    </div>
                </div>
            </fieldset>

            {{-- TOMBOL AKSI UTAMA UNTUK UPDATE PROJECT INFO/QUOTA --}}
            <div class="form-actions" style="grid-column: span 2; justify-content: flex-end; margin-top: 10px; border-bottom: 1px solid #dcdcdc; padding-bottom: 20px;">
                <a href="{{ route('projects.show', $project) }}" class="btn-secondary">
                    <span class="material-symbols-outlined">cancel</span>
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <span class="material-symbols-outlined">save</span>
                    Simpan Perubahan Project
                </button>
            </div>
        </div>
    </form> {{-- AKHIR FORM UTAMA --}}

    {{-- BAGIAN PENGELOLAAN ANGGOTA TIM (Form terpisah, tidak diubah) --}}
    <div class="form-grid-layout" style="grid-template-columns: 1fr;">
        <fieldset class="form-section span-2" style="margin-top: 1.5rem;">
            <legend class="section-title">Kelola Anggota Tim</legend>

            {{-- DAFTAR ANGGOTA TIM (Tabel) --}}
            @if($project->employees->count() > 0)
            <div style="overflow-x: auto;">
                <table class="data-table" style="margin-top: 1rem;">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Departemen</th>
                            <th>Role</th>
                            <th>Bergabung</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @foreach($project->employees as $employee)
                        <tr>
                            <td>{{ $employee->nama_lengkap }}</td>
                            <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>
                            <td>{{ $employee->department->nama_departmen ?? '-' }}</td>
                            <td>{{ $employee->pivot->role ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($employee->pivot->joined_at)->format('d-m-Y') }}</td>
                            <td style="text-align: center;">
                                <form action="{{ route('projects.removeEmployee', [$project, $employee]) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" title="Hapus" onclick="return confirm('Yakin hapus dari tim?')" class="btn-icon-danger">
                                        <span class="material-symbols-outlined" style="color:#dc2626; font-size:1.2rem;">delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="empty-state">Belum ada anggota tim</p>
            @endif

            @if($availableEmployees->count() > 0)
            <hr style="margin: 1.5rem 0; border: none; border-top: 1px solid #d4e4f7;">

            <form action="{{ route('projects.addEmployee', $project) }}" method="POST" class="form-grid-layout" style="grid-template-columns: 1fr 1fr auto; gap: 0.75rem;">
                @csrf
                <div class="form-group" style="margin-bottom: 0;">
                    <label for="employee_id">Tambah Employee <span class="required">*</span></label>
                    <select id="employee_id" name="employee_id" class="form-input @error('employee_id') input-error @enderror" required>
                        <option value="">Pilih Employee</option>
                        @foreach($availableEmployees as $emp)
                        <option value="{{ $emp->id }}" {{ old('employee_id') == $emp->id ? 'selected' : '' }}>{{ $emp->nama_lengkap }} ({{ $emp->position->nama_jabatan ?? '-' }} - {{ $emp->department->nama_departmen ?? '-' }})</option>
                        @endforeach
                    </select>
                    @error('employee_id')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label for="role">Role</label>
                    <input type="text" id="role" name="role" value="{{ old('role') }}" placeholder="e.g. Developer, Designer" class="form-input @error('role') input-error @enderror">
                    @error('role')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-primary" style="align-self: flex-end; padding: 10px 15px;">
                    <span class="material-symbols-outlined">person_add</span>
                    Tambah ke Tim
                </button>
            </form>
            @else
            <hr style="margin: 1.5rem 0; border: none; border-top: 1px solid #d4e4f7;">
            <p style="text-align: center; color: #6b7280; font-size: 0.95rem;">Semua employee sudah ditambahkan atau tidak ada employee tersedia</p>
            @endif
        </fieldset>
    </div>


</div>

@endsection