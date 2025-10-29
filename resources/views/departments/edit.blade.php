@extends('master')
@section('title', 'Edit Departemen')
@section('content')

<div class="form-container">

    <h2 class="form-header-title">Edit Departemen {{ $department->nama_departmen }}</h2>
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid-layout">
            <div class="form-group span-2">
                <label for="nama_departmen">Nama Departemen : </label>
                <input type="text" id="nama_departmen" name="nama_departmen" value="{{ old('nama_departmen', $department->nama_departmen) }}">
            </div>
            <div class="form-group span-2" style="justify-content: flex-end;">
                <div style="text-align: right;">
                    <a href="{{ route('departments.index') }}" class="btn-secondary">Kembali</a>
                    <button type="submit" class="btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection