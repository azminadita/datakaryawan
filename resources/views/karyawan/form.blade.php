@extends('layouts.master')

@section('title', isset($karyawan) ? 'Edit Data Karyawan' : 'Tambah Data Karyawan')
@section('heading', isset($karyawan) ? 'Edit Data Karyawan' : 'Tambah Data Karyawan')

@section('bc')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('karyawan.index') }}">Data Karyawan</a></li>
            <li class="breadcrumb-item active">{{ isset($karyawan) ? 'Edit Data' : 'Tambah Data' }}</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ isset($karyawan) ? 'Edit Data Karyawan' : 'Tambah Data Karyawan' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($karyawan) ? route('karyawan.update', $karyawan->id) : route('karyawan.store') }}" method="POST">
                @csrf
                @if(isset($karyawan))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" class="form-control" id="nip" value="{{ isset($karyawan) ? $karyawan->nip : '' }}" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ isset($karyawan) ? $karyawan->nama : '' }}" required>
                </div>
                <div class="form-group">
                    <label for="tempatLahir">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" class="form-control" id="tempatLahir" value="{{ isset($karyawan) ? $karyawan->tempatLahir : '' }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" class="form-control" id="tanggalLahir" value="{{ isset($karyawan) ? $karyawan->tanggalLahir : '' }}" required>
                </div>
                <div class="form-group">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select name="jenisKelamin" class="form-control" id="jenisKelamin" required>
                        <option value="Laki-laki" {{ isset($karyawan) && $karyawan->jenisKelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ isset($karyawan) && $karyawan->jenisKelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" name="agama" class="form-control" id="agama" value="{{ isset($karyawan) ? $karyawan->agama : '' }}" required>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" class="form-control" id="jabatan" required>
                        <option value="Direktur" {{ isset($karyawan) && $karyawan->jabatan == 'Direktur' ? 'selected' : '' }}>Direktur</option>
                        <option value="HRD" {{ isset($karyawan) && $karyawan->jabatan == 'HRD' ? 'selected' : '' }}>HRD</option>
                        <option value="Finance" {{ isset($karyawan) && $karyawan->jabatan == 'Finance' ? 'selected' : '' }}>Finance</option>
                        <option value="Karyawan" {{ isset($karyawan) && $karyawan->jabatan == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($karyawan) ? 'Update' : 'Simpan' }}</button>
                <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
