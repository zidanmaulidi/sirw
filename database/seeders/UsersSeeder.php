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
            // [
            //     ////////////////////////////////////// <<<< login Admin >>>> ////////////////////////////////////// 
            //     'name' => 'Yonatan Efrassetyo', 
            //     'email' => 'syefrassetyo@gmail.com',
            //     'password' => '12345678',
            //     'level_users_id' => '1',
            // ],
            // [
            //     'name' => 'Admin', 
            //     'email' => 'sadmin@gmail.com',
            //     'password' => '12345678',
            //     'level_users_id' => '1',    // level user 1
            // ],
            // ////////////////// <<< Login RW >>> //////////////////
            // [
            //     'name' => 'RW', 
            //     'email' => 'srw@gmail.com',
            //     'password' => '12345678',
            //     'level_users_id' => '2',    // level user 2
            // ],
            // ///////// << Login RT >>> /////////
            // [
            //     'name' => 'RT 10', 
            //     'email' => 'srt10@gmail.com',
            //     'password' => '12345678',
            //     'level_users_id' => '3',    // level user 3
            //     'domisilis_id' => '1',
            // ],
            // [
            //     'name' => 'RT 11', 
            //     'email' => 'srt11@gmail.com',
            //     'password' => '12345678',
            //     'level_users_id' => '3',    // level user 3
            //     'domisilis_id' => '2',
            // ],
            // ///// << Login Pengurus RT >>> /////
            // [
            //     'name' => 'Pengurus RT 10', 
            //     'email' => 'sprt10@gmail.com',
            //     'password' => '12345678',
            //     'level_users_id' => '4',    // level user 4
            //     'domisilis_id' => '1',
            // ],
            // [
            //     'name' => 'Pengurus RT 11', 
            //     'email' => 'sprt11@gmail.com',
            //     'password' => '12345678',
            //     'level_users_id' => '4',    // level user 4
            //     'domisilis_id' => '2',
            // ],


            ////////////////// <<< Login User >>> //////////////////
            // [
            //     'name' => 'User1', 
            //     'email' => 'suser1@gmail.com',
            //     'password' => '$2y$12$l/7BCPAaYuUH1nxJR.C/J.HOnaZyFFyAQWs50ajLHjAHtoizxx/Dy',
            //     'level_users_id' => '5',    // level user 5
            //     'domisilis_id' => '1',
            //     'kependudukan' => 'warga tetap',
            //     'no_KK' => '3201060401123456',
            //     'NIK' => '12345678912345',
            //     'jenis_kelamin' => 'laki-laki',
            //     'tempat_lahir' => 'Malang',
            //     'agama' => 'islam',
            //     'pendidikan' => 'sma',
            //     'jenis_pekerjaan' => 'supir',
            //     'status' => 'kawin',
            // ],
        ]);
    }
}
