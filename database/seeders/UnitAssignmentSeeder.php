<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unit_assignments = [
            ['unit_assignment'             =>                'Homicide Unit'],
            ['unit_assignment'             =>                'Cybercrime Unit'],
            ['unit_assignment'             =>                'Narcotics Unit'],
            ['unit_assignment'             =>                'Traffic Unit'],
            ['unit_assignment'             =>                'Patrol Unit'],
            ['unit_assignment'             =>                'K-9 Unit'],
            ['unit_assignment'             =>                'Internal Affairs'],
            ['unit_assignment'             =>                'Special Weapons and Tactics (SWAT)'],
        ];

        foreach ($unit_assignments as $unit) {
            Unit::create($unit);
        }
    }
}
