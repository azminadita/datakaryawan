<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::latest()->get(); 
        return view('Karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required|date',
            'jenisKelamin' => 'required',
            'agama' => 'required',
            'jabatan' => 'required|string',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')->with('message', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.form', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required|date',
            'jenisKelamin' => 'required',
            'agama' => 'required',
            'jabatan' => 'required|string',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')->with('message', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('message', 'Data Berhasil Dihapus');
    }
}
