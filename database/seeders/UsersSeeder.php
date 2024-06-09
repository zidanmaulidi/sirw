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
        ]);
    }
}
