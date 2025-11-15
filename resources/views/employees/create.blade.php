@extends('master')
@section('title', 'Form Input Pegawai')
@section('content')

<div class="form-container">
    <div class="form-header">
        <h2 class="form-header-title">Tambah Data Pegawai</h2>
        <p class="form-subtitle">Lengkapi semua informasi pegawai dengan benar</p>
    </div>

    <form action="{{ route('employees.store') }}" method="POST" novalidate>
        @csrf
        <div class="form-grid-layout">
            <!-- Informasi Personal -->
            <fieldset class="form-section">
                <legend class="section-title">Informasi Personal</legend>

                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap <span class="required">*</span></label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                        placeholder="Masukkan nama lengkap" required
                        class="@error('nama_lengkap') input-error @enderror">
                    @error('nama_lengkap')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="nama@example.com" required
                        class="@error('email') input-error @enderror">
                    @error('email')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon <span class="required">*</span></label>
                    <input type="tel" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}"
                        placeholder="08xx xxxx xxxx" required
                        class="@error('nomor_telepon') input-error @enderror">
                    @error('nomor_telepon')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        class="@error('tanggal_lahir') input-error @enderror">
                    @error('tanggal_lahir')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3"
                        placeholder="Masukkan alamat lengkap"
                        class="@error('alamat') input-error @enderror">{{ old('alamat') }}</textarea>
                    @error('alamat')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>

            <!-- Informasi Pekerjaan -->
            <fieldset class="form-section">
                <legend class="section-title">Informasi Pekerjaan</legend>

                <div class="form-group">
                    <label for="departemen_id">Departemen <span class="required">*</span></label>
                    <select id="departemen_id" name="departemen_id" required
                        class="@error('departemen_id') input-error @enderror">
                        <option value="">-- Pilih Departemen --</option>
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}"
                            {{ old('departemen_id') == $department->id ? 'selected' : '' }}>
                            {{ $department->nama_departmen }}
                        </option>
                        @endforeach
                    </select>
                    @error('departemen_id')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan_id">Jabatan <span class="required">*</span></label>
                    <select id="jabatan_id" name="jabatan_id" required
                        class="@error('jabatan_id') input-error @enderror">
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach ($positions as $position)
                        <option value="{{ $position->id }}"
                            {{ old('jabatan_id') == $position->id ? 'selected' : '' }}>
                            {{ $position->nama_jabatan }}
                        </option>
                        @endforeach
                    </select>
                    @error('jabatan_id')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk <span class="required">*</span></label>
                    <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}"
                        required class="@error('tanggal_masuk') input-error @enderror">
                    @error('tanggal_masuk')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status <span class="required">*</span></label>
                    <select id="status" name="status" required
                        class="@error('status') input-error @enderror">
                        <option value="">-- Pilih Status --</option>
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>

            <div class="form-actions span-2">
                <a href="{{ route('employees.index') }}" class="btn-secondary">
                    <span class="material-symbols-outlined">arrow_back</span>
                    Kembali
                </a>
                <button type="submit" class="btn-primary">
                    <span class="material-symbols-outlined">save</span>
                    Simpan Data
                </button>
            </div>
        </div>
    </form>
</div>
@endsection