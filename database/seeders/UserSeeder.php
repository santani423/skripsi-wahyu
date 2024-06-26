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
                    $email = 'wahyu@gmail.com';
                    $level = 'wahyu';
                }
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'level' => $level,
                    'password' => Hash::make('123')
                ]);
            }
        }
    }
}
