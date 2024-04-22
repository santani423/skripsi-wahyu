<?php

namespace App\Http\Controllers;

use App\Models\ProfileDosen;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // dd($request);
        // Validasi input
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|string|min:6',
        //     'id_api' => 'required|string',
        //     'nama' => 'required|string',
        // ]);

        // if ($validator->fails()) {
        //     // Jika validasi gagal, kembalikan pesan kesalahan dalam bentuk JSON
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

        try {
            // Simpan data ke dalam tabel users
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->email); // Pastikan untuk mengenkripsi password
            $user->save();

            // Simpan data ke dalam tabel profile_dosens
            $profileDosen = new ProfileDosen();
            $profileDosen->user_id = $user->id;
            $profileDosen->id_api = $request->profile_dosen_id;
            $profileDosen->nama = $request->name;
            $profileDosen->save();
            $user = new User();




            return redirect()->route('dosen-skripsi.index')->with('success', 'Dosen Berhasil Di Simpan');
            // Kembalikan respons berhasil
            return response()->json(['message' => 'Data berhasil disimpan'], 201);
        } catch (\Exception $e) {
            // Rollback transaksi database jika terjadi kesalahan
            return back();

            // Kembalikan respons gagal dengan pesan kesalahan
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfileDosen $profileDosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileDosen $profileDosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileDosen $profileDosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileDosen $profileDosen)
    {
        //
    }
}
