@extends('master')
@section('title', 'Edit Departemen')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Form Edit Departemen {{ $department->nama_departmen }}</h2>
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="form-layout-table">
            <tr>
                <td><label for="nama_departmen">Nama Departemen : </label></td>
                <td><input type="text" id="nama_departmen" name="nama_departmen" value="{{ old('nama_departmen', $department->nama_departmen) }}"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <a href="{{ route('departments.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Update</button>
                </td>
            </tr>
        </table>
    </form>
</div>

@endsection