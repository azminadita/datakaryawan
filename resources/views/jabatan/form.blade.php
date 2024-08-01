@extends('layouts.master')

@section('title', isset($jabatan) ? 'Edit Data Jabatan' : 'Tambah Data Jabatan')
@section('heading', isset($jabatan) ? 'Edit Data Jabatan' : 'Tambah Data Jabatan')

@section('bc')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Data Jabatan</a></li>
            <li class="breadcrumb-item active">{{ isset($jabatan) ? 'Edit Data' : 'Tambah Data' }}</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ isset($jabatan) ? 'Edit Data Jabatan' : 'Tambah Data Jabatan' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($jabatan) ? route('jabatan.update', $jabatan->id) : route('jabatan.store') }}" method="POST">
                @csrf
                @if(isset($jabatan))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="nama">Nama Jabatan</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ isset($jabatan) ? $jabatan->nama : '' }}" required>
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($jabatan) ? 'Update' : 'Simpan' }}</button>
                <a href="{{ route('jabatan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
