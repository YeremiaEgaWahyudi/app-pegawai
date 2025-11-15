@extends('master')
@section('title', 'Tambah Gaji Karyawan')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Form Gaji Karyawan</h2>
    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf
        <div class="form-grid-layout">
            <div class="form-group span-2">
                <label for="karyawan_id">Karyawan : </label>
                <select name="karyawan_id" id="karyawan_id">
                    @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}"
                        {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                        {{ $employee->nama_lengkap }}
                        (Jabatan: {{ $employee->position->nama_jabatan ?? 'N/A' }}
                        / Departemen: {{ $employee->department->nama_departmen ?? 'N/A' }}
                        / Gaji Pokok: Rp {{ number_format($employee->position->gaji_pokok ?? 0, 0, ',', '.') }})
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="bulan">Bulan : </label>
                <input type="text" name="bulan" id="bulan" value="{{ old('bulan') }}" placeholder="Contoh: Okt 2025">
            </div>
            <div class="form-group">
                <label for="gaji_pokok">Gaji Pokok :</label>
                <input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok') }}">
            </div>

            <div class="form-group">
                <label for="tunjangan">Tunjangan :</label>
                <input type="number" name="tunjangan" id="tunjangan" value="{{ old('tunjangan', 0) }}">
            </div>
            <div class="form-group">
                <label for="potongan">Potongan :</label>
                <input type="number" name="potongan" id="potongan" value="{{ old('potongan', 0) }}">
            </div>

            <div class="form-group span-2" style="justify-content: flex-end;">
                <div style="text-align: right;">
                    <a href="{{ route('salaries.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection