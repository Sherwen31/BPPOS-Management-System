<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            ['position_name'             =>              'Provincial Director'],
            ['position_name'             =>              'City Director'],
            ['position_name'             =>              'Chief of Police'],
            ['position_name'             =>              'Station Commander'],
            ['position_name'             =>              'Precinct Commander'],
            ['position_name'             =>              'Chief, Criminal Investigation and Detection Group (CIDG)'],
            ['position_name'             =>              'Director, Highway Patrol Group (HPG)'],
            ['position_name'             =>              'Cief, Special Action Forces (SAF)'],
            ['position_name'             =>              'Chief, Internal Affairs Services (IAS)'],
            ['position_name'             =>              'Chief, Personnel and Records Management'],
            ['position_name'             =>              'Chief, Finance Service'],
            ['position_name'             =>              'Chief, Logistics'],
            ['position_name'             =>              'Chief, Public Information Office'],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
