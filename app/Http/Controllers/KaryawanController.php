<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Jabatan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $kry = Karyawan::all(); // eloquent ORM
        return view('karyawan.index', compact('nomor', 'kry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jbt = Jabatan::all();
        return view('karyawan.form', compact('jbt'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kry = new Karyawan;
        $kry->nip = $request->nip;
        $kry->nama = $request->nama;
        $kry->tempatLahir = $request->tempat;
        $kry->tanggalLahir = $request->tanggal;
        $kry->jenisKelamin = $request->jk;
        $kry->agama = $request->agama;
        $kry->jabatans_id = $request->jabatan;
        $kry->save();

        return redirect('/karyawan/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
