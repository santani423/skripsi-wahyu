<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuans = Pengajuan::all();
        return view('pages/pengajuan/index',compact('pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/pengajuan/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pengajuan' => 'required|string|max:3',
            'id_kendaraan' => 'required|string|max:3',
            'tgl_bunga' => 'required|string|max:3',
            'tgl_bayar' => 'required|date',
            'nama' => 'required|string|max:20',
            'umur' => 'required|string|max:3',
            'Stts_tmpt_tgl' => 'required|string|max:20',
            'slik' => 'required|string|max:8',
            'gaji' => 'required|integer',
            'stts_kerja' => 'required|string|max:20',
            'jns_thn_kndr' => 'required|string|max:8',
            'mm_kndr' => 'required|string|max:20',
            'jngka_wktu' => 'required|string|max:10',
            'harga' => 'required|integer',
            'byr_bln' => 'required|integer',
            'ttl_byr' => 'required|integer',
        ]);

        Pengajuan::create($request->all());

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
