<?php

namespace Database\Seeders;

use App\Models\League;
use App\Models\Team;
use App\Models\Week;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $teams = [
            [
                'id' => 1,
                'name' => 'Manchester United',
                'strength' => 82,
            ],
            [
                'id' => 2,
                'name' => 'Manchester City',
                'strength' => 85,
            ],
            [
                'id' => 3,
                'name' => 'Liverpool',
                'strength' => 80,
            ],
            [
                'id' => 4,
                'name' => 'Arsenal',
                'strength' => 72,
            ],
        ];
        Team::insert($teams);

        $weeks = [];
        for ($i = 1; $i <= ((count($teams) - 1) * 2); $i++) {
            $weeks[] = [
                'number' => $i,
                'played' => 0,
                'season' => date('Y', strtotime('-1 year')) . '/' . date('y'),
            ];
        }
        Week::insert($weeks);

        $league = [];
        foreach ($teams as $team) {
            $league[] = ['team_id' => $team['id']];
        }
        League::insert($league);
    }
}
