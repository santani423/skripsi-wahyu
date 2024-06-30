<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraans = Kendaraan::get();
        return view('pages/kendaraan/index',compact('kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/kendaraan/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_ketentuan' => 'required|string|max:3',
            'id_rule' => 'nullable|string|max:3',
            'ketentuan' => 'required|string|max:20',
            'operator' => 'required|string|max:5',
            'nilai' => 'required|string|max:20',
        ]);

        Kendaraan::create($validatedData);

        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kendaraan)
    {
        $kendaraan = Kendaraan::where('id_ketentuan',$kendaraan)->first();
        return view('pages/kendaraan/edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kendaraan)
    {
        $request->validate([
            'id_rule' => 'nullable|string|max:3',
            'ketentuan' => 'required|string|max:20',
            'operator' => 'required|string|max:5',
            'nilai' => 'required|string|max:20',
        ]);

        $kendaraan = Kendaraan::where('id_ketentuan',$kendaraan)->first();;
        $kendaraan->id_rule = $request->id_rule;
        $kendaraan->ketentuan = $request->ketentuan;
        $kendaraan->operator = $request->operator;
        $kendaraan->nilai = $request->nilai;
        $kendaraan->save();

        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $kendaraan)
    {
        Kendaraan::where('id_ketentuan',$kendaraan)->delete();;
        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil dihapus');
    }
}
