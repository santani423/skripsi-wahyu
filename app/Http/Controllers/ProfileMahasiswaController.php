<?php

namespace App\Http\Controllers;

use App\Models\ProfileMahasiswa;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Priode;
use App\Models\DosenSkripsi;
use App\Models\Skripsi;

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
        $dosen = User::where('level', 'dosen')->get();
        return view("pages.mahasiswa.create", compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Simpan data ke dalam tabel users
            $periode = Priode::where('is_active', 1)->first();
            if ($periode) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->level = 'mahasiswa';
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

                $skripsi = new Skripsi();
                $skripsi->profile_id = $ProfileMahasiswa->id;
                $skripsi->dosen_pembimbing_1_id = $request->dosen_pembimbing_1;
                $skripsi->dosen_pembimbing_2_id = $request->dosen_pembimbing_2;
                $skripsi->periode_id = $periode->id;
                $skripsi->jumlah_step = 0;
                $skripsi->save();

                $dosenSkripsi = new DosenSkripsi();
                $dosenSkripsi->profile_dosen_id = $request->dosen_pembimbing_1;
                $dosenSkripsi->skripsi_id = $skripsi->id;
                $dosenSkripsi->skripsi_id = 'pembimbing 1';
                $dosenSkripsi->save();

                $dosenSkripsi = new DosenSkripsi();
                $dosenSkripsi->profile_dosen_id = $request->dosen_pembimbing_2;
                $dosenSkripsi->skripsi_id = $skripsi->id;
                $dosenSkripsi->skripsi_id = 'pembimbing 2';
                $dosenSkripsi->save();




                return redirect()->route('mahasiswa.index')->with('success', 'Dosen Berhasil Di Simpan');
            }
            return redirect()->route('mahasiswa.index')->with('success', 'Harap aktifkan periode untuk dapat menambah mahasiswa');

        } catch (\Exception $e) {
            // Rollback transaksi database jika terjadi kesalahan
            return back();

        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $profileMahasiswa = ProfileMahasiswa::find($id);
        // dd($profileMahasiswa);
        $dosen = User::where('level', 'dosen')->get();
        return view("pages.mahasiswa.detail", compact('dosen'));
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
    public function daftarSkripsi()
    {
        $data = ProfileMahasiswa::orderBy("created_at", "desc")->paginate(10);
        return view("pages.mahasiswa.daftarSkripsi", compact("data"));
    }
}
