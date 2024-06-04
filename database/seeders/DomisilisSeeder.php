<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DomisilisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('domisilis')->insert([
            ['domisili' => 'RT 10'], 
            ['domisili' => 'RT 11'], 
        ]);
    }
}
