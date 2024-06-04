<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Level_usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('level_users')->insert([
            ['level_kode' => 'ADM', 'level_nama' => 'Admin'],
            ['level_kode' => 'RW', 'level_nama' => 'RW'],
            ['level_kode' => 'RT', 'level_nama' => 'RT'],
            ['level_kode' => 'PRT', 'level_nama' => 'Pengurus RT'],
            ['level_kode' => 'WRG', 'level_nama' => 'Warga'],
        ]);
    }
}
