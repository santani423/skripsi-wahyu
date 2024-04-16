<?php

namespace App\Http\Controllers;

use App\Models\DosenSkripsi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenSkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dosen.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi input
        $request->validate([
            'profile_dosen_id' => 'required|integer',
            'skripsi_id' => 'required|integer',
        ]);

        // Buat instance baru dari model DosenSkripsi
        $dosenSkripsi = new DosenSkripsi();

        // Isi atribut dari model dengan data dari request
        $dosenSkripsi->profile_dosen_id = $request->profile_dosen_id;
        $dosenSkripsi->skripsi_id = $request->skripsi_id;
        $dosenSkripsi->status = $request->status;

        // Simpan data ke dalam basis data
        $dosenSkripsi->save();

        // Kembalikan respons berhasil
        return response()->json(['message' => 'Dosen Skripsi berhasil disimpan'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(DosenSkripsi $dosenSkripsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DosenSkripsi $dosenSkripsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DosenSkripsi $dosenSkripsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DosenSkripsi $dosenSkripsi)
    {
        //
    }
}
