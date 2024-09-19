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
            ['position_name'             =>              'Chief of Police'],
            ['position_name'             =>              'Deputy Chief'],
            ['position_name'             =>              'Captain'],
            ['position_name'             =>              'Lieutenant'],
            ['position_name'             =>              'Sergeant'],
            ['position_name'             =>              'Detective'],
            ['position_name'             =>              'Officer'],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
