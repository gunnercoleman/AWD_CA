<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\League;
use Carbon\Carbon;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        League::insert([
            ['name'=> 'Champions League', 'image'=> 'championsleague.png', 'description'=> 'Europes top football clubs compete annually for this trophy, the prestigious UEFA Champions League title.'],
            ['name'=> 'Premier League', 'image'=> 'premierleague.png', 'description'=> 'Englands top football league where elite clubs compete for the league title.'],
            ['name'=> 'La Liga', 'image'=> 'laliga.png', 'description'=> 'Spain’s top football league where elite clubs compete for national championship glory.'],
            ['name'=> 'Bundesliga', 'image'=> 'bundesliga.png', 'description'=> 'Germanys premier football league where top clubs battle fiercely for national supremacy.'],
            ['name'=> 'Serie A', 'image'=> 'seriea.png', 'description'=> 'Italys top football league where renowned clubs compete passionately for national championship glory.'],
            ['name'=> 'Club World Cup', 'image'=> 'clubworldcup.png', 'description'=> 'Annual international tournament where top clubs from each continent compete for global supremacy.'],                                                
        ]);
    }
}
