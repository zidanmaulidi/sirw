<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            
            //////////////// <<< Login User >>> //////////////////
            [
                'name' => 'admin', 
                'email' => 'admin@gmail.com',
                'password' => '$2y$12$l/7BCPAaYuUH1nxJR.C/J.HOnaZyFFyAQWs50ajLHjAHtoizxx/Dy',
                'level_users_id' => '1',    
            ],

            [
                'name' => 'RW', 
                'email' => 'rw@gmail.com',
                'password' => '$2y$12$l/7BCPAaYuUH1nxJR.C/J.HOnaZyFFyAQWs50ajLHjAHtoizxx/Dy',
                'level_users_id' => '2',    
            ],

            [
                'name' => 'sekretaris RW', 
                'email' => 'sekretarisrW@gmail.com',
                'password' => '$2y$12$l/7BCPAaYuUH1nxJR.C/J.HOnaZyFFyAQWs50ajLHjAHtoizxx/Dy',
                'level_users_id' => '3',    
            ],

            [
                'name' => 'Bendahara RW', 
                'email' => 'bendahararW@gmail.com',
                'password' => '$2y$12$l/7BCPAaYuUH1nxJR.C/J.HOnaZyFFyAQWs50ajLHjAHtoizxx/Dy',
                'level_users_id' => '3',    
            ],

            [
                'name' => 'RT 10', 
                'email' => 'rt10@gmail.com',
                'password' => '$2y$12$l/7BCPAaYuUH1nxJR.C/J.HOnaZyFFyAQWs50ajLHjAHtoizxx/Dy',
                'level_users_id' => '4',    
            ],

            [
                'name' => 'RT 11', 
                'email' => 'rt11@gmail.com',
                'password' => '$2y$12$l/7BCPAaYuUH1nxJR.C/J.HOnaZyFFyAQWs50ajLHjAHtoizxx/Dy',
                'level_users_id' => '4',    
            ],

            // [
            //     'name' => 'User2', 
            //     'email' => 'suser2@gmail.com',
            //     'password' => '$2y$12$l/7BCPAaYuUH1nxJR.C/J.HOnaZyFFyAQWs50ajLHjAHtoizxx/Dy',
            //     'level_users_id' => '2',    // level user 5
            //     'domisilis_id' => '2',
            //     'kependudukan' => 'warga tetap',
            //     'no_KK' => '3201060401123789',
            //     'NIK' => '12345678912789',
            //     'jenis_kelamin' => 'laki-laki',
            //     'tempat_lahir' => 'Blitar',
            //     'agama' => 'protestan',
            //     'pendidikan' => 'sma',
            //     'jenis_pekerjaan' => 'Teller',
            //     'status' => 'kawin',
            // ],

            // [
            //     'name' => 'User3', 
            //     'email' => 'suser3@gmail.com',
            //     'password' => '$2y$12$l/7BCPAaYuUH1nxJR.C/J.HOnaZyFFyAQWs50ajLHjAHtoizxx/Dy',
            //     'level_users_id' => '3',    // level user 5
            //     'domisilis_id' => '1',
            //     'kependudukan' => 'warga tetap',
            //     'no_KK' => '3201060401123123',
            //     'NIK' => '12345678912123',
            //     'jenis_kelamin' => 'laki-laki',
            //     'tempat_lahir' => 'Surabaya',
            //     'agama' => 'katholik',
            //     'pendidikan' => 'S1',
            //     'jenis_pekerjaan' => 'Guru',
            //     'status' => 'kawin',
            // ],

            // [
            //     'name' => 'User4', 
            //     'email' => 'suser4@gmail.com',
            //     'password' => '$2y$12$l/7BCPAaYuUH1nxJR.C/J.HOnaZyFFyAQWs50ajLHjAHtoizxx/Dy',
            //     'level_users_id' => '4',    // level user 5
            //     'domisilis_id' => '2',
            //     'kependudukan' => 'warga tetap',
            //     'no_KK' => '3201060401123234',
            //     'NIK' => '12345678912234',
            //     'jenis_kelamin' => 'laki-laki',
            //     'tempat_lahir' => 'Jakarta',
            //     'agama' => 'hindu',
            //     'pendidikan' => 'S2',
            //     'jenis_pekerjaan' => 'Dosen',
            //     'status' => 'kawin',
            // ],

            // [
            //     'name' => 'User5', 
            //     'email' => 'suser5@gmail.com',
            //     'password' => '$2y$12$l/7BCPAaYuUH1nxJR.C/J.HOnaZyFFyAQWs50ajLHjAHtoizxx/Dy',
            //     'level_users_id' => '5',    // level user 5
            //     'domisilis_id' => '1',
            //     'kependudukan' => 'warga tetap',
            //     'no_KK' => '3201060401123678',
            //     'NIK' => '12345678912678',
            //     'jenis_kelamin' => 'laki-laki',
            //     'tempat_lahir' => 'Kediri',
            //     'agama' => 'budha',
            //     'pendidikan' => 'sma',
            //     'jenis_pekerjaan' => 'Karyawan Swasta',
            //     'status' => 'kawin',

            // ],
        ]);
    }
}
