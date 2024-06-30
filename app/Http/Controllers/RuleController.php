<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rules = Rule::all();
        return view('pages/rule/index',compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/rule/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'hasil' => 'required|string|max:10',
        ]);
        
        Rule::create([ 
            'hasil' => $request->hasil,
        ]);
        

        return redirect()->route('rule.index')->with('success', 'Data Rule berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rule = Rule::where('id',$id)->first();
        return view('pages/rule/edit', compact('rule'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([ 
            'hasil' => 'required|string|max:10',
        ]);

        Rule::where('id',$id)->update([ 
            'hasil' => $request->hasil,
        ]);

        return redirect()->route('rule.index')->with('success', 'Data Rule berhasil diupbah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rule::where('id',$id)->delete();

        return redirect()->route('rule.index')->with('success', 'Data Rule berhasil dihpaus');
    }
}
