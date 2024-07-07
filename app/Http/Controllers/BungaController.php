<?php

namespace App\Http\Controllers;

use App\Models\Bunga;
use Illuminate\Http\Request;

class BungaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bungas = Bunga::all();

        return view('pages/bunga/index',compact('bungas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/bunga/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jangka_waktu' => 'required|string|max:2',
            'bunga_perbulan' => 'required|numeric',
        ]);

        Bunga::create($request->all());

        return redirect()->route('bunga.index')->with('success', 'Bunga created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bunga $bunga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($bunga)
    {
        $bunga = Bunga::where('id',$bunga)->first();

        return view('pages/bunga/edit',compact('bunga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $bunga)
{
    $bunga = Bunga::where('id', $bunga)->first();
    if ($bunga) { 
        $bunga->jangka_waktu = $request->input('jangka_waktu');
        $bunga->bunga_perbulan = $request->input('bunga_perbulan');
        // Tambahkan field lainnya jika ada
        
    
        $bunga->save();
    }

    return redirect()->route('bunga.index')->with('success', 'Data Bunga berhasil diupdate');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($bunga)
    {
        $bunga = Bunga::where('id', $bunga)->delete();
        return redirect()->route('bunga.index')->with('success', 'Data Bunga berhasil dihapus');
    }
}
