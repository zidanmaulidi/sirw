<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class WargasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('wargas')->insert([
        //     [
        //         'nama_lengkap' => '',
        //         'alamat' => '',
        //         'no_telepon' => '',
        //         'no_KK' => '',
        //         'NIK' => '',
        //         'jenis_kelamin' => '',
        //         'tempat_lahir' => '',
        //         'agama' => '',
        //         'pendidikan' => '',
        //         'jenis_pekerjaan' => '',
        //         'status' => '',
        //         'domisilis_id' => '',
        //         'kependudukan' => '',
        //         'profile' => '',
        //     ]
        // ]);

        $faker = Faker::create('id_ID');
        $alamatMalang = [
            'Jl. Veteran', 'Jl. Semeru', 'Jl. Arjuno', 'Jl. Bromo', 'Jl. Ijen', 'Jl. Batu', 'Jl. Tlogomas', 'Jl. Soekarno Hatta', 'Jl. Bukit Barisan', 'Jl. Simpang Balapan'
        ];

        for ($i = 1; $i <= 20; $i++) {
            DB::table('wargas')->insert([
                'nama_lengkap' => $faker->name(),
                'alamat' => $alamatMalang[array_rand($alamatMalang)] . ' No. ' . $faker->numberBetween(1, 100),
                'no_telepon' => $faker->phoneNumber(),
                'no_KK' => '3573' . str_pad($faker->unique()->numberBetween(100000, 999999), 6, '0', STR_PAD_LEFT),
                'NIK' => $faker->unique()->regexify('[0-9]{16}'),
                'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->date('Y-m-d', '-60 years'),
                'agama' => $faker->randomElement(['islam', 'protestan', 'katholik', 'hindu', 'budha', 'khonghucu']),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
                'jenis_pekerjaan' => $faker->jobTitle(),
                'status' => $faker->randomElement(['kawin', 'belum kawin']),
                'domisilis_id' => 1,
                'kependudukan' => $i <= 10 ? 'warga tetap' : 'warga pendatang',
                'profile' => $faker->uuid(),
            ]);
        }

        for ($i = 21; $i <= 40; $i++) {
            DB::table('wargas')->insert([
                'nama_lengkap' => $faker->name(),
                'alamat' => $alamatMalang[array_rand($alamatMalang)] . ' No. ' . $faker->numberBetween(1, 100),
                'no_telepon' => $faker->phoneNumber(),
                'no_KK' => '3573' . str_pad($faker->unique()->numberBetween(100000, 999999), 6, '0', STR_PAD_LEFT),
                'NIK' => $faker->unique()->regexify('[0-9]{16}'),
                'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->date('Y-m-d', '-60 years'),
                'agama' => $faker->randomElement(['islam', 'protestan', 'katholik', 'hindu', 'budha', 'khonghucu']),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
                'jenis_pekerjaan' => $faker->jobTitle(),
                'status' => $faker->randomElement(['kawin', 'belum kawin']),
                'domisilis_id' => 2,
                'kependudukan' => $i <= 30 ? 'warga tetap' : 'warga pendatang',
                'profile' => $faker->uuid(),
            ]);
        }
    }
}
