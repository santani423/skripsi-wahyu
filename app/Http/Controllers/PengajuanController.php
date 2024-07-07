<?php

namespace App\Http\Controllers;

use App\Models\Bunga;
use App\Models\Kendaraan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Services\ExpertSystemService;

class PengajuanController extends Controller
{

    protected $expertSystemService;

    public function __construct(ExpertSystemService $expertSystemService)
    {
        $this->expertSystemService = $expertSystemService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuans = Pengajuan::all();
        $kendaraans = Kendaraan::get();
        return view('pages/pengajuan/index',compact('pengajuans','kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $kendaraans = Kendaraan::get();
        $bunga = Bunga::get();
        return view('pages/pengajuan/create',compact('kendaraans','bunga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kendaraan' => 'required',
            'tgl_bunga' => 'required',
            'tgl_bayar' => 'required|date',
            'nama' => 'required|string|max:20',
            'umur' => 'required',
            'Stts_tmpt_tgl' => 'required|string|max:20',
            'slik' => 'required|string|max:8',
            'gaji' => 'required|integer',
            'stts_kerja' => 'required|string|max:20',
            'jns_thn_kndr' => 'required|string|max:8',
            'mm_kndr' => 'required|string|max:20',
            'jngka_wktu' => 'required|string|max:10',
            'harga' => 'required|integer',
            'byr_bln' => 'required|integer',
            'ttl_byr' => 'required|integer',
        ]);

        Pengajuan::create($request->all());

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        return view('pages/pengajuan/show',compact('pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        // dd($pengajuan);
        // dd($request->all());
        $data = [
            'age' => $pengajuan->umur,
            'slik' => $request->slik,
            'vehicleYear' =>  $request->vehicleYear,
            'salary' => $pengajuan->gaji,
            'residenceType' => $pengajuan->Stts_tmpt_tgl,
            'employmentStatus' =>  $pengajuan->stts_kerja,
        ];
        
        $result = $this->expertSystemService->evaluateLoanApplication(
            $data['age'],
            $data['slik'],
            $data['vehicleYear'],
            $data['salary'],
            $data['residenceType'],
            $data['employmentStatus']
        );
        dd($data);
        $pengajuan->sts_pengajuan = $result['status'];
        $pengajuan->save();

        return back()->with('success', $result['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
