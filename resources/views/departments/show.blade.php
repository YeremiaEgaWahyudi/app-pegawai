@extends('master')
@section('title', 'Detail Departemen')
@section('content')

<div class="form-container">
    <h2 class="form-header-title">Detail Departemen {{$department->nama_departmen}}</h2>

    <div class="form-grid-layout">
        <div class="form-group span-2">
            <label>Nama Departemen : </label>
            <div class="detail-value">{{ old('nama_departmen', $department->nama_departmen) }}</div>
        </div>
        <div class="form-group span-2" style="justify-content: flex-end; margin-top: 0.5rem;">
            <div style="text-align: right;">
                <a href="{{ route('departments.index') }}" class="btn-secondary">Kembali</a>
                <a href="{{ route('departments.edit', $department->id) }}"class="btn-primary">Edit</a>
            </div>
        </div>
    </div>

</div>
@endsection