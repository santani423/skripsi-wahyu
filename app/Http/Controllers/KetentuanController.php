<?php

namespace App\Http\Controllers;

use App\Models\Ketentuan;
use App\Models\Rule;
use Illuminate\Http\Request;

class KetentuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ketentuans = Ketentuan::join('rules','rules.id','=','ketentuans.id_rule')->select('rules.hasil','ketentuans.*')->get();
        return view('pages.ketentuans.index', compact('ketentuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rules = Rule::get();
        return view('pages.ketentuans.create',compact('rules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'id_rule' => 'required|string|max:3',
            'ketentuan' => 'required|string|max:20',
            'operator' => 'required|string|max:5',
            'nilai' => 'required|string|max:20',
        ]);

        Ketentuan::create($request->all());

        return redirect()->route('ketentuans.index')->with('success', 'Ketentuan created successfully.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Ketentuan $ketentuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ketentuan)
    {
        $ketentuan = Ketentuan::where('id',$ketentuan)->first();
        $rules = Rule::get();
        return view('pages.ketentuans.edit', compact('ketentuan','rules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$ketentuan)
    {
        $request->validate([
            'id_rule' => 'required|string|max:3',
            'ketentuan' => 'required|string|max:20',
            'operator' => 'required|string|max:5',
            'nilai' => 'required|string|max:20',
        ]);

        $ketentuan = Ketentuan::where('id',$ketentuan)->first();
        $ketentuan->update($request->all());

        return redirect()->route('ketentuans.index')->with('success', 'Ketentuan updated successfully.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ketentuan $ketentuan)
    {
       
        $ketentuan->delete();

        return redirect()->route('ketentuans.index')->with('success', 'Ketentuan deleted successfully.');
    }
}
