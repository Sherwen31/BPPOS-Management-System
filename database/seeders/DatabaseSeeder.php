<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PositionSeeder::class,
            RankSeeder::class,
            UnitAssignmentSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);

        $roles = ['admin', 'user', 'super_admin'];
        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::firstOrCreate(['name' => $role]);
        }

        User::factory(1000)->create()->each(function ($user) use ($roles) {
            $role = $roles[array_rand($roles)];
            $user->assignRole($role);
        });
    }
}
