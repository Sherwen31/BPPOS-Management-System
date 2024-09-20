<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cached permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create or retrieve permissions
        $accessAllPages = Permission::firstOrCreate(['name' => 'access-all-pages']);
        $accessAdminPages = Permission::firstOrCreate(['name' => 'access-admin-pages']);
        $accessUserPages = Permission::firstOrCreate(['name' => 'access-user-pages']);

        // Create or retrieve roles and assign permissions
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdminRole->syncPermissions([$accessAllPages, $accessAdminPages, $accessUserPages]);

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions([$accessAdminPages, $accessUserPages]);

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->syncPermissions([$accessUserPages]);

        // Create or retrieve users and assign roles
        $user = User::firstOrCreate([
            'email'                 =>          'johndoe@gmail.com',
        ], [
            'last_name'             =>          'Doe',
            'first_name'            =>          'John',
            'middle_name'           =>          'Boltiks',
            'username'              =>          'johndoe',
            'police_id'             =>          '1234-1234',
            'contact_number'        =>          '09123456789',
            'address'               =>          'New York City',
            'position_id'           =>          5,
            'rank'                  =>          'Police Executive Master Sergeant',
            'unit_id'               =>          5,
            'year_attended'         =>          '2020-10-10',
            'email_verified_at'     =>          now(),
            'password'              =>          bcrypt('password'),
        ]);

        $user->assignRole($userRole);

        $admin = User::firstOrCreate([
            'email'                 =>              'admin@gmail.com',
        ], [
            'last_name'             =>              null,
            'first_name'            =>              'Administrator',
            'middle_name'           =>              null,
            'username'              =>              'admin',
            'police_id'             =>              'admin',
            'contact_number'        =>              '09123456789',
            'address'               =>              'Los Angeles',
            'position_id'           =>              2,
            'rank'                  =>              'Police Executive Major',
            'unit_id'               =>              2,
            'year_attended'         =>              '2019-08-08',
            'email_verified_at'     =>              now(),
            'password'              =>              bcrypt('password'),
        ]);

        $admin->assignRole($adminRole);

        $superAdmin = User::firstOrCreate([
            'email'                     =>              'super_admin@gmail.com',
        ], [
            'last_name'                 =>              'Administrator',
            'first_name'                =>              'Super',
            'middle_name'               =>              null,
            'username'                  =>              'super_admin',
            'police_id'                 =>              'super_admin',
            'contact_number'            =>              '09123456789',
            'address'                   =>              'USA',
            'position_id'               =>              1,
            'rank'                      =>              'Director-General',
            'unit_id'                   =>              1,
            'year_attended'             =>              '2019-08-08',
            'email_verified_at'         =>              now(),
            'password'                  =>              bcrypt('password'),
        ]);

        $superAdmin->assignRole($superAdminRole);
    }
}
