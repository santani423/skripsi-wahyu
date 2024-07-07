<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Ketentuan;
use App\Models\Rule;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraans = Kendaraan::join('rules','rules.id','=','kendaraans.id_rule')
        ->join('ketentuans','ketentuans.id','=','kendaraans.ketentuan')
        ->select('kendaraans.*','rules.hasil','ketentuans.ketentuan')->get();
        return view('pages/kendaraan/index',compact('kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rules = Rule::get();
        $ketentuans = Ketentuan::get();
        return view('pages/kendaraan/create',compact('rules','ketentuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([ 
        'id_rule' => 'nullable|string|max:3',
        'ketentuan' => 'required|string|max:20',
        'operator' => 'required|string|max:5',
        'nilai' => 'required|string|max:20',
        'tahun_kendaraan' => 'required|integer',
        'nama_kendaraan' => 'required|string|max:100',
        'merek_kendaraan' => 'required|string|max:100',
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
        $kendaraan = Kendaraan::where('id',$kendaraan)->first();
        
        $rules = Rule::get();
        $ketentuans = Ketentuan::get();
        return view('pages/kendaraan/edit', compact('kendaraan','ketentuans','rules'));
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
            'tahun_kendaraan' => 'required|integer',
            'nama_kendaraan' => 'required|string|max:100',
            'merek_kendaraan' => 'required|string|max:100',
        ]);
    
        $kendaraan = Kendaraan::where('id', $kendaraan)->first();
        if ($kendaraan) {
            $kendaraan->id_rule = $request->id_rule;
            $kendaraan->ketentuan = $request->ketentuan;
            $kendaraan->operator = $request->operator;
            $kendaraan->nilai = $request->nilai;
            $kendaraan->tahun_kendaraan = $request->tahun_kendaraan;
            $kendaraan->nama_kendaraan = $request->nama_kendaraan;
            $kendaraan->merek_kendaraan = $request->merek_kendaraan;
            $kendaraan->save();
    
            return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil diupdate');
        } else {
            return redirect()->route('kendaraan.index')->with('error', 'Data Kendaraan tidak ditemukan');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $kendaraan)
    {
        Kendaraan::where('id',$kendaraan)->delete();;
        return redirect()->route('kendaraan.index')->with('success', 'Data Kendaraan berhasil dihapus');
    }
}
