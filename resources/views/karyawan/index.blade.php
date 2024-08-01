@extends('layouts.master')

@section('title', 'Data Karyawan')
@section('heading', 'Data Karyawan')

@section('bc')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Karyawan</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('karyawan.create') }}" class="btn btn-primary"><i class="fa fa-folder-plus"></i> Tambah Data</a>
            </h3>
        </div>
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Lengkap</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($karyawans as $karyawan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $karyawan->nip }}</td>
                            <td>{{ $karyawan->nama }}</td>
                            <td>{{ $karyawan->tempatLahir }}</td>
                            <td>{{ $karyawan->tanggalLahir }}</td>
                            <td>{{ $karyawan->jenisKelamin }}</td>
                            <td>{{ $karyawan->agama }}</td>
                            <td>{{ $karyawan->jabatan->nama }}</td>
                            <td>
                                <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i></a>
                                <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Data Karyawan tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
