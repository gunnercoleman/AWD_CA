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
                'position' => 1,
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
                'description' => 'Best club in Italy',
                'image' => 'intermilan.jpg'
            ],

            [
                'name' => 'Tottenham',
                'position' => 9,
                'description' => 'Shit team in London',
                'image' => 'tottenham.jpg'
            ],

            [
                'name' => 'Barcelona',
                'position' => 2,
                'description' => 'Best club in Spain',
                'image' => 'barcelona.jpg'
            ],

            [
                'name' => 'Liverpool',
                'position' => 12,
                'description' => 'Overrated club in England',
                'image' => 'liverpool.jpg'
            ],

            [
                'name' => 'Manchester United',
                'position' => 10,
                'description' => 'Most hated club in England',
                'image' => 'manchesterunited.jpg'
            ],

            [
                'name' => 'Real Madrid',
                'position' => 1,
                'description' => 'Most hated club in Spain',
                'image' => 'realmadrid.jpg'
            ],

            [
                'name' => 'Atletico Madrid',
                'position' => 4,
                'description' => 'Underrated club in Spain',
                'image' => 'atleticomadrid.jpg'
            ],

            [
                'name' => 'Bayer Leverkusen',
                'position' => 3,
                'description' => 'Underrated club in Germany',
                'image' => 'bayerleverkusen.jpg'
            ],

            [
                'name' => 'Dortmund',
                'position' => 4,
                'description' => 'Popular club in Germany',
                'image' => 'dortmund.jpg'
            ],

            [
                'name' => 'Napoli',
                'position' => 3,
                'description' => 'Underrated club in Italy',
                'image' => 'napoli.jpg'
            ],

            [
                'name' => 'AC Milan',
                'position' => 2,
                'description' => 'Most historic club in Italy',
                'image' => 'acmilan.jpg'
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
