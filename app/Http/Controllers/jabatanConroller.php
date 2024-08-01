<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::latest()->get(); 
        return view('jabatan.index', compact('jabatans'));
    }

    public function create()
    {
        return view('jabatan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:jabatans,nama',
        ]);

        Jabatan::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jabatan.index')->with('message', 'Data Jabatan Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:jabatans,nama,' . $id,
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jabatan.index')->with('message', 'Data Jabatan Berhasil Diubah');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with('message', 'Data Jabatan Berhasil Dihapus');
    }
}
