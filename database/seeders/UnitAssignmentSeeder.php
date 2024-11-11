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
            ['unit_assignment'             =>                'Administration'],
            ['unit_assignment'             =>                'Intelligence'],
            ['unit_assignment'             =>                'Operation'],
            ['unit_assignment'             =>                'Supply'],
            ['unit_assignment'             =>                'Police Community Relation'],
            ['unit_assignment'             =>                'Finance'],
            ['unit_assignment'             =>                'Investigation'],
            ['unit_assignment'             =>                'Human Research and Resources  Development'],
            ['unit_assignment'             =>                'PSSMU'],
            ['unit_assignment'             =>                'PPU'],
        ];

        foreach ($unit_assignments as $unit) {
            Unit::create($unit);
        }
    }
}
