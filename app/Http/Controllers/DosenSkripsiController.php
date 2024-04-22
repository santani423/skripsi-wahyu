<?php

namespace App\Http\Controllers;

use App\Models\DosenSkripsi;
use App\Models\ProfileDosen;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenSkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = ProfileDosen::orderBy("created_at", "desc")->paginate(10);
        return view('pages.dosen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $user = new User();

        $user->name = $request->namaDosen;
        $user->email = $request->emailDosen;
        $user->password = bcrypt($request->emailDosen);
        $user->save();

        $ProfileDosen = new ProfileDosen();
        $ProfileDosen->nama = $request->namaDosen;
        $ProfileDosen->id_api = $request->profile_dosen_id;
        $ProfileDosen->user_id = $user->id;
        $ProfileDosen->save();



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
