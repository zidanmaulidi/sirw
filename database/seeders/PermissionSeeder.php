<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            'admin',
            'rw',
            'rt',
            'sekretaris_rt',
            'bendahara_rt',
            'warga',
        ];

        // Create roles if they do not exist
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Define permissions
        $permissions = [
            'view_roles',
            'view_permissions',

            'view_users',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',

            'view_domisilis',
            'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ];

        // Create permissions if they do not exist
        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }

        // Retrieve roles
        $adminRole = Role::where('name', 'admin')->first();
        $sekretarisRtRole = Role::where('name', 'sekretaris_rt')->first();
        $bendaharaRtRole = Role::where('name', 'bendahara_rt')->first();
        $rwRole = Role::where('name', 'rw')->first();
        $rtRole = Role::where('name', 'rt')->first();
        $wargaRole = Role::where('name', 'warga')->first();

        // Assign permissions to roles
        $adminRole->givePermissionTo([
            'view_roles',
            'view_permissions',

            'view_users',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',

            'view_domisilis',
            'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ]);

        $sekretarisRtRole->givePermissionTo([
            // 'view_roles',
            // 'view_permissions',

            'view_users',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',

            // 'view_domisilis',
            // 'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ]);

        $bendaharaRtRole->givePermissionTo([
            // 'view_roles',
            // 'view_permissions',

            'view_users',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',

            // 'view_domisilis',
            // 'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ]);

        $rwRole->givePermissionTo([
            // 'view_roles',
            // 'view_permissions',

            'view_users',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',

            // 'view_domisilis',
            // 'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ]);

        $rtRole->givePermissionTo([
            // 'view_roles',
            // 'view_permissions',

            'view_users',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',

            // 'view_domisilis',
            // 'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ]);

        $wargaRole->givePermissionTo([
            // 'view_roles',
            // 'view_permissions',

            // 'view_users',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',

            // 'view_domisilis',
            // 'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ]);
        
    }
}
