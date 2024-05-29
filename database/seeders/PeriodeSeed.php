<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Priode;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeriodeSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('priodes')->insert([
            [
                'tahun' => '2024',
                'status_semester' => 'Ganjil',
                'tanggal_awal' => '2024-01-01',
                'tanggal_akhir' => '2024-06-30',
                'keterangan' => 'Semester Ganjil 2024',
                'is_active' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tahun' => '2024',
                'status_semester' => 'Genap',
                'tanggal_awal' => '2024-07-01',
                'tanggal_akhir' => '2024-12-31',
                'keterangan' => 'Semester Genap 2024',
                'is_active' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan data lainnya jika diperlukan
        ]);
    }
}
