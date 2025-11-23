@extends('master')
@section('title', 'Buat Project Baru')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Buat Project Baru</h2>
        <p class="form-subtitle">Tambahkan project baru dan atur tim</p>
    </div>

    <form action="{{ route('projects.store') }}" method="POST" class="form-grid-layout">
        @csrf

        <fieldset class="form-section span-2">
            <legend class="section-title">Informasi Project</legend>

            <div class="form-group">
                <label for="name">Nama Project <span class="required">*</span></label>
                <input type="text" id="name" name="name" class="@error('name') input-error @enderror"
                    placeholder="Masukkan nama project" required value="{{ old('name') }}">
                @error('name')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea id="description" name="description" class="@error('description') input-error @enderror"
                    placeholder="Jelaskan project ini..." rows="4">{{ old('description') }}</textarea>
                @error('description')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="start_date">Tanggal Mulai <span class="required">*</span></label>
                <input type="date" id="start_date" name="start_date" class="@error('start_date') input-error @enderror"
                    required value="{{ old('start_date') }}">
                @error('start_date')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="end_date">Tanggal Selesai</label>
                <input type="date" id="end_date" name="end_date" class="@error('end_date') input-error @enderror"
                    value="{{ old('end_date') }}">
                @error('end_date')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status <span class="required">*</span></label>
                <select id="status" name="status" class="@error('status') input-error @enderror" required>
                    <option value="">Pilih Status</option>
                    <option value="planning" {{ old('status') === 'planning' ? 'selected' : '' }}>Planning</option>
                    <option value="in_progress" {{ old('status') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="quota">Jumlah Tim yang Dibutuhkan <span class="required">*</span></label>
                <input type="number" id="quota" name="quota" class="@error('quota') input-error @enderror"
                    min="1" required value="{{ old('quota', 1) }}">
                @error('quota')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </fieldset>

        <div class="form-actions span-2">
            <a href="{{ route('projects.index') }}" class="btn-secondary">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali
            </a>
            <button type="submit" class="btn-primary">
                <span class="material-symbols-outlined">save</span>
                Buat Project
            </button>
        </div>
    </form>
</div>

<p style="text-align: center; color: #6b7280; font-size: 0.95rem; margin-top: 1.5rem;">
    💡 Anggota tim dapat ditambahkan setelah project dibuat
</p>

@endsection