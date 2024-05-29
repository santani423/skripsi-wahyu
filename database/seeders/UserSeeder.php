<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ProfileMahasiswa;
use App\Models\ProfileDosen;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i <= 100; $i++) {
            $ran = rand(100, 999);

            $email = fake()->unique()->safeEmail();
            if ($ran > 500) {
                $level = 'mahasiswa';

            } else {
                $level = 'dosen';
            }
            $ran2 = rand(100, 999);
            if ($ran > 500) {
                $jk = 'L';
            } else {
                $jk = 'P';
            }



            $user = User::where('email', $email)->first();
            if (!$user) {
                $name = $faker->name;
                if ($i == 1) {
                    $email = 'admin@gmail.com';
                    $level = 'adminUtama';
                } else if ($i == 2) {
                    $email = 'kemahasiswaan@gmail.com';
                    $level = 'kemahasiswaan';
                }
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'level' => $level,
                    'password' => Hash::make('123')
                ]);
                if ($level == 'mahasiswa') {
                    $ProfileMahasiswa = new ProfileMahasiswa();
                    $ProfileMahasiswa->user_id = $user->id;
                    $ProfileMahasiswa->id_api = rand(100, 999);
                    $ProfileMahasiswa->keterangan = 'mahasiswa';
                    $ProfileMahasiswa->nama = $name;
                    $ProfileMahasiswa->save();
                } else if ($level == 'dosen') {
                    $profileDosen = new ProfileDosen();
                    $profileDosen->user_id = $user->id;
                    $profileDosen->id_api = rand(100, 999);
                    $profileDosen->nama = $name;
                    $profileDosen->save();
                }


            }
        }
    }
}
