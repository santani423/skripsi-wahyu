<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BungasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus semua data dari tabel bungas dan reset auto increment ID
        DB::table('bungas')->truncate();

        // Masukkan data sampel
        DB::table('bungas')->insert([
            [
                'jangka_waktu' => '12',
                'bunga_perbulan' => 1.50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jangka_waktu' => '24',
                'bunga_perbulan' => 1.75,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
