<?php

namespace Database\Seeders;

use App\Models\Rank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ranks = [
            ['rank_name'            =>              'Police General (PGEN)'],
            ['rank_name'            =>              'Police Lieutenant General (PLTGEN)'],
            ['rank_name'            =>              'Police Brigadier General (PBGEN)'],
            ['rank_name'            =>              'Police Colonel (PCOL)'],
            ['rank_name'            =>              'Police Lieutenant Colonel (PLTCOL)'],
            ['rank_name'            =>              'Police Major (PMAJ)'],
            ['rank_name'            =>              'Police Captain (PCPT)'],
            ['rank_name'            =>              'Police Lieutenant (PLT)'],
            ['rank_name'            =>              'Police Executive Master Sergeant (PEMS)'],
            ['rank_name'            =>              'Police Chief Master Sergeant (PCMS)'],
            ['rank_name'            =>              'Police Senior Master Sergeant (PSMS)'],
            ['rank_name'            =>              'Police Master Sergeant (PMSg)'],
            ['rank_name'            =>              'Police Staff Sergeant (PSSg)'],
            ['rank_name'            =>              'Police Corporal (PCpl)'],
            ['rank_name'            =>              'Patrolman/Patrolwoman (Pat)'],
        ];

        foreach ($ranks as $rank) {
            Rank::create($rank);
        }
    }
}
