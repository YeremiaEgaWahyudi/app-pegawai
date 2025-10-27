@extends('master')
@section('title', 'Tambah Gaji Karyawan')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Form Gaji Karyawan</h2>
    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf
        <table class="form-layout-table">
            <tr>
                <td><label for="karyawan_id">Karyawan : </label></td>
                <td>
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
                </td>
            </tr>
            <tr>
                <td><label for="bulan">Bulan : </label></td>
                <td><input type="text" name="bulan" id="bulan" value="{{ old('bulan') }}" placeholder="Contoh: Okt 2025"></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok :</label></td>
                <td><input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok') }}"></td>
            </tr>
            <tr>
                <td><label for="tunjangan">Tunjangan :</label></td>
                <td><input type="number" name="tunjangan" id="tunjangan" value="{{ old('tunjangan', 0) }}"></td>
            </tr>
            <tr>
                <td><label for="potongan">Potongan :</label></td>
                <td><input type="number" name="potongan" id="potongan" value="{{ old('potongan', 0) }}"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <a href="{{ route('salaries.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>

@endsection