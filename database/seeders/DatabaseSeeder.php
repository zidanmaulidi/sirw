<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Domisili;
use App\Models\Kegiatan;
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
        $this->call(Level_usersSeeder::class);
        $this->call(DomisilisSeeder::class);
        $this->call(KegiatansSeeder::class);
        $this->call(AduansSeeder::class);
        $this->call(CriteriasSeeder::class);
        $this->call(AlternatifsSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UsersSeeder::class);
        
    }
}
