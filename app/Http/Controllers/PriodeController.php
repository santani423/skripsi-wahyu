<?php

namespace App\Http\Controllers;

use App\Models\Priode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Priode::orderBy("created_at", "desc")->paginate(10);
        // dd($data);
        return view("pages.periode.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Priode::orderBy("created_at", "desc")->paginate(10);
        return view("pages.periode.create", compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun' => 'required ',
            'status_semester' => 'required|string|max:255',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Proses penyimpanan data ke database
        Priode::create($validatedData);

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('periode.index')->with('success', 'Periode berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Priode $priode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $periode = Priode::find($id);
        return view('pages.periode.edit', compact('periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tahun' => 'required ',
            'status_semester' => 'required|string|max:255',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            'keterangan' => 'nullable|string|max:255',
        ]);
        $periode = Priode::find($id);
        // Proses penyimpanan data ke database
        $periode->update($validatedData);

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('periode.index')->with('success', 'Periode berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $periode = Priode::find($id);
        $periode->delete();

        return redirect()->route('periode.index')->with('success', 'Periode berhasil dihapus.');
    }
}
