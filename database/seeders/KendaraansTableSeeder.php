<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KendaraansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus semua data dari tabel kendaraans dan reset auto increment ID
        DB::table('kendaraans')->truncate();

        // Masukkan data sampel
        DB::table('kendaraans')->insert([
            [
                'id_rule' => '1',
                'ketentuan' => '1',
                'operator' => '=',
                'nilai' => '100000000',
                'tahun_kendaraan' => 2020,
                'nama_kendaraan' => 'Toyota Avanza',
                'merek_kendaraan' => 'Toyota',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_rule' => '2',
                'ketentuan' => '2',
                'operator' => '>',
                'nilai' => '300000000',
                'tahun_kendaraan' => 2019,
                'nama_kendaraan' => 'Honda Civic',
                'merek_kendaraan' => 'Honda',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
