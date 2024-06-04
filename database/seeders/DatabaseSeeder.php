<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LevelUser;
use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
// use Illuminate\Foundation\Auth\User;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // $LevelAdmin = LevelUser::factory()->create([
        //     'level_nama' => 'Admin',
            
        // ]);

        // $LevelRW = LevelUser::factory()->create([
        //     'level_nama' => 'RW',
            
        // ]);

        // $role = Role::create(['name' => 'writer']);
        // $permission = Permission::create(['name' => 'edit articles']);

        // $role = Role::create(['level_nama' => 'Admin']);
        // $LevelAdmin->assignRole($role);

        // $user1 = User::factory()->create([
        //     'name' => 'Adminrole',
        //     'email' => 'admin@test.com',
        // ]);

        // $user2 = User::factory()->create([
        //     'name' => 'Editingrole',
        //     'email' => 'edit@test.com',
        // ]);

        // $role = Role::create(['name' => 'Adminrole']);
        // $user1->assignRole($role);

        // $role = Role::create(['name' => 'Editingrole']);
        // $user2->assignRole($role);
    }
}
