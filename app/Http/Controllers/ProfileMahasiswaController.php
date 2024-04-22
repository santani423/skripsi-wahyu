<?php

namespace App\Http\Controllers;

use App\Models\ProfileMahasiswa;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProfileMahasiswa::orderBy("created_at", "desc")->paginate(10);
        return view("pages.mahasiswa.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.mahasiswa.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Simpan data ke dalam tabel users
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->email); // Pastikan untuk mengenkripsi password
            $user->save();

            // Simpan data ke dalam tabel profile_dosens
            $ProfileMahasiswa = new ProfileMahasiswa();
            $ProfileMahasiswa->user_id = $user->id;
            $ProfileMahasiswa->id_api = $request->profile_mahasiswa_id;
            $ProfileMahasiswa->keterangan = 'mahasiswa';
            $ProfileMahasiswa->nama = $request->name;
            $ProfileMahasiswa->save();
            $user = new User();




            return redirect()->route('mahasiswa.index')->with('success', 'Dosen Berhasil Di Simpan');
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
    public function show(ProfileMahasiswa $profileMahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileMahasiswa $profileMahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileMahasiswa $profileMahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileMahasiswa $profileMahasiswa)
    {
        //
    }
}
