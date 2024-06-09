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
            'sekretaris_rw',
            'bendahara_rw',
            'rt_10',
            'rt_11',
            // 'warga',
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
            
            'view_wargas_rt10',
            'view_wargas_rt11',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',
            'view_aduans',

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
        $sekretarisRwRole = Role::where('name', 'sekretaris_rw')->first();
        $bendaharaRwRole = Role::where('name', 'bendahara_rw')->first();
        $rwRole = Role::where('name', 'rw')->first();
        $rt10Role = Role::where('name', 'rt_10')->first();
        $rt11Role = Role::where('name', 'rt_11')->first();
        // $wargaRole = Role::where('name', 'warga')->first();

        // Assign permissions to roles
        $adminRole->givePermissionTo([
            'view_roles',
            'view_permissions',

            'view_users',
            
            'view_wargas_rt10',
            'view_wargas_rt11',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',
            'view_aduans',

            'view_domisilis',
            'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ]);

        $rwRole->givePermissionTo([
            // 'view_roles',
            // 'view_permissions',

            // 'view_users',

            'view_wargas_rt10',
            'view_wargas_rt11',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',
            'view_aduans',

            // 'view_domisilis',
            // 'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ]);

        $bendaharaRwRole->givePermissionTo([
            // 'view_roles',
            // 'view_permissions',

            // 'view_users',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',
            'view_aduans',

            // 'view_domisilis',
            // 'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ]);

        $rt10Role->givePermissionTo([
            // 'view_roles',
            // 'view_permissions',

            // 'view_users',

            'view_wargas_rt10',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',
            'view_aduans',

            // 'view_domisilis',
            // 'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ]);

        $rt11Role->givePermissionTo([
            // 'view_roles',
            // 'view_permissions',

            // 'view_users',

            'view_wargas_rt11',

            'view_informasis',
            'view_keuangans',
            'view_kegiatans',
            'view_aduans',

            // 'view_domisilis',
            // 'view_level_users',

            'view_criterias',
            'view_alternatifs',
            'view_utilitis',
            'view_nilai_akhirs',
            'view_rangkings',
        ]);
        

        // $wargaRole->givePermissionTo([
        //     // 'view_roles',
        //     // 'view_permissions',

        //     // 'view_users',

        //     'view_informasis',
        //     'view_keuangans',
        //     'view_kegiatans',

        //     // 'view_domisilis',
        //     // 'view_level_users',

        //     'view_criterias',
        //     'view_alternatifs',
        //     'view_utilitis',
        //     'view_nilai_akhirs',
        //     'view_rangkings',
        // ]);
        
    }
}
