<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\League;
use Carbon\Carbon;

/*
Here is my seeder class

Seeders are used to populate the database with sample data to test if your web app is working correctly
*/

class ClubSeeder extends Seeder
{
    public function run(): void
    {

        $currentTimestamp = Carbon::now();

        $clubs = [
            [
                'name' => 'Arsenal',
                'position' => 2,
                'description' => 'Best club in London',
                'image' => 'arsenal.jpg'
            ],

            [
                'name' => 'Bayern Munich',
                'position' => 1,
                'description' => 'Best club in Germany',
                'image' => 'bayernmunich.jpg'
            ],

            [
                'name' => 'Inter Milan',
                'position' => 3,
                'description' => 'Mid club in Italy',
                'image' => 'intermilan.jpg'
            ],

            [
                'name' => 'Tottenham',
                'position' => 16,
                'description' => 'Below average team in London',
                'image' => 'tottenham.jpg'
            ],

            [
                'name' => 'Barcelona',
                'position' => 2,
                'description' => 'Best club in Spain',
                'image' => 'barcelona.jpg'
            ],

        ];

        foreach ($clubs as $clubData)
        {
            $club = Club::create(array_merge($clubData, ['created_at' => $currentTimestamp, ]));

            $leagues = League::inRandomOrder()->take(2)->pluck('id');

            $club->leagues()->attach($leagues);
        }
    }
}
