<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KetentuansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus semua data dari tabel ketentuans dan reset auto increment ID
        // DB::table('ketentuans')->truncate();

        // Masukkan data sampel
        DB::table('ketentuans')->insert([
            [
                'id_rule' => '1', // pastikan id_rule adalah varchar sesuai dengan skema tabel
                'ketentuan' => '1',
                'operator' => 'opr1',
                'nilai' => '100000000', // pastikan nilai adalah varchar sesuai dengan skema tabel
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_rule' => '2', // pastikan id_rule adalah varchar sesuai dengan skema tabel
                'ketentuan' => '2',
                'operator' => 'opr1',
                'nilai' => '300000000', // pastikan nilai adalah varchar sesuai dengan skema tabel
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_rule' => '3', // pastikan id_rule adalah varchar sesuai dengan skema tabel
                'ketentuan' => '3',
                'operator' => 'opr1',
                'nilai' => '350000000', // pastikan nilai adalah varchar sesuai dengan skema tabel
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
