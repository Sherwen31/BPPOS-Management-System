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
        $accessUserPages = Permission::firstOrCreate(['name' => 'access-user-pages']);

        // Create or retrieve roles and assign permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions([$accessAllPages, $accessUserPages]);

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->syncPermissions([$accessUserPages]);

        // Create or retrieve users and assign roles
        $user = User::firstOrCreate([
            'email' => 'johndoe@gmail.com',
        ], [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'police_id' => '1234-1234',
            'contact_number' => '09123456789',
            'address' => 'New York City',
            'position' => 'Director General',
            'rank' => 'Police Executive Master Sergeant',
            'unit_assignment' => 'Balig Kubaw City',
            'year_attended' => '2020-10-10',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $user->assignRole($userRole);

        $admin = User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'Administrator',
            'username' => 'admin',
            'police_id' => 'admin',
            'contact_number' => '09123456789',
            'address' => 'Los Angeles',
            'position' => 'Director General II',
            'rank' => 'Police Executive Major',
            'unit_assignment' => 'Tukal Bako City',
            'year_attended' => '2019-08-08',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole($adminRole);
    }
}
