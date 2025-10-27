@extends('master')
@section('title', 'Edit Gaji')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Edit Gaji {{ $salary->employee->nama_lengkap ?? 'Karyawan' }}</h2>
    <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table class="form-layout-table">
            <tr>
                <td><label for="karyawan_id">Karyawan : </label></td>
                <td>
                    <select name="karyawan_id" id="karyawan_id" disabled>
                        <option value="{{ $salary->employee->id }}" selected>
                            {{ $salary->employee->nama_lengkap }}
                            (Jabatan: {{ $salary->employee->position->nama_jabatan ?? 'N/A' }}
                            / Departemen: {{ $salary->employee->department->nama_departmen ?? 'N/A' }}
                            / Gaji Pokok: Rp {{ number_format($salary->employee->position->gaji_pokok ?? 0, 0, ',', '.') }})
                        </option>
                    </select>
                    <input type="hidden" name="karyawan_id" id="karyawan_id" value="{{ $salary->employee->id }}">
                </td>
            </tr>
            <tr>
                <td><label for="bulan">Bulan : </label></td>
                <td><input type="text" name="bulan" id="bulan" value="{{ old('bulan', $salary->bulan) }}" placeholder="Contoh: Okt 2025"></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok :</label></td>
                <td><input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok', $salary->gaji_pokok) }}"></td>
            </tr>
            <tr>
                <td><label for="tunjangan">Tunjangan :</label></td>
                <td><input type="number" name="tunjangan" id="tunjangan" value="{{ old('tunjangan', $salary->tunjangan) }}"></td>
            </tr>
            <tr>
                <td><label for="potongan">Potongan :</label></td>
                <td><input type="number" name="potongan" id="potongan" value="{{ old('potongan', $salary->potongan) }}"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <a href="{{ route('salaries.index') }}" class="btn-secondary">Batal</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>

@endsection